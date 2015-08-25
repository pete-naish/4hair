<?php

class PerchBlog_Util extends PerchAPI_Factory
{
	protected $table     = 'blog_posts';
	protected $pk        = 'postID';
	protected $singular_classname = 'PerchBlog_Post';
	


	public function find_importable_files()
	{
		return PerchUtil::get_dir_contents(PerchUtil::file_path(PERCH_PATH.'/addons/apps/'.$this->api->app_id.'/import_data/'), false);
	}


	public function import_from_wp($wordpress_file, $format="textile")
	{
		$out = array();

	    // LOAD XML
	    $xml = simplexml_load_file(PerchUtil::file_path(PERCH_PATH.'/addons/apps/'.$this->api->app_id.'/import_data/'.$wordpress_file));


	    // AUTHORS
	    $Authors = new PerchBlog_Authors($this->api);
	    
	    foreach($xml->channel->children('wp', true) as $tag) {
	        if ($tag->getName()=='author') {
	            $data = array();
	            $data['authorEmail']        = (string) $tag->author_email;
	            $data['authorSlug']  		= PerchUtil::urlify((string) $tag->author_display_name);
	            $data['authorGivenName']    = (string) $tag->author_first_name;
	            $data['authorFamilyName']   = (string) $tag->author_last_name;
	            $data['authorImportRef']	= (string) $tag->author_login;

	            if ($data['authorGivenName']=='') {
	            	$data['authorGivenName'] = (string) $tag->author_login;
	            }

	            $Author = $Authors->find_or_create_by_email((string) $tag->author_email, $data);

	            if ($Author) {
	            	$out[] = array('type'=>'success',
									'messages'=>array(
											'Author ' . (string) $tag->author_display_name,
											'Successfully imported'
										));
	            }
	            
	        }
	    }

	    
	    // POSTS
	    $Posts   = new PerchBlog_Posts($this->api);

	    foreach($xml->channel->item as $item) {

	        $post = array();
	        $post['postTitle']  = (string) $item->title;
	        $post['postTags']	= '';

	        $post['postLegacyURL'] = parse_url((string) $item->link, PHP_URL_PATH);
	        
	        $post_type = false;
	        
	        foreach($item->children('wp', true) as $tag) {
	            $tagName = $tag->getName();
	            
	            switch($tagName) {
	                case 'post_id':
	                    $post['postImportID']  = (string) $tag;
	                    break;
	                    
	                case 'post_type':
	                    $post_type = (string) $tag;
	                    break;
	                
	                    
	                case 'post_date_gmt':
	                    $post['postDateTime'] = (string) $tag;
	                    break;
	                    
	                case 'comment_status':
	                    $val = (string) $tag;
	                    if ($val=='open') {
	                        $post['postAllowComments']  = '1';
	                    }else{
	                        $post['postAllowComments']  = '0';
	                    }
	                    break;
	                    
	                case 'post_name':
	                    $post['postSlug'] = (string) $tag;
	                    break;
	                
	                case 'status':
	                    $val = (string) $tag;
	                    $post['postStatus'] = 'Draft';
	                    if ($val=='publish') $post['postStatus'] = 'Published';
	                    break;
	            }
	        
	        }
	        
	        // if it's not of type 'post', skip.
	        if ($post_type!='post') continue;
	        
	        // At this point, check we don't already have the post (as we know have the postImportID to identify it)
	        $Post = $Posts->find_by_importID($post['postImportID']);
	        if (is_object($Post)) {
	        	$out[] = array('type'=>'success',
									'messages'=>array(
											'Post ' . $Post->postTitle(),
											'Already imported'
										));

	        	continue;

	        }
	        	        
	        
	        foreach($item->children('dc', true) as $tag) {
	            $tagName = $tag->getName();
	            
	            switch($tagName) {
	                case 'creator':
	                    $val = (string) $tag;
	                    $Author = $Authors->get_one_by('authorImportRef', $val);
	                    
	                    if (is_object($Author)) {
	                        $post['authorID'] = $Author->id();
	                    }
	                    break;
	            }
	        }
	        
	        foreach($item->children('content', true) as $tag) {
	            $tagName = $tag->getName();
	            
	            switch($tagName) {
	                case 'encoded':

	                    $raw  = (string) $tag;
	                    $html = PerchUtil::text_to_html($raw);

	                    if ($format=='textile') {
							$post['postDescRaw']        = $raw;
	                    	$post['postDescHTML']       = $html;
	                    }else{
	                    	$post['postDescRaw']        = $html;
	                    	$post['postDescHTML']       = $html;
	                    }
	                                    
	                    
	                    break;
	            }
	        }
	        
	        foreach($item->children('excerpt', true) as $tag) {
	            $tagName = $tag->getName();
	            
	            switch($tagName) {
	                case 'encoded':
	                    
	                    $raw  = (string) $tag;
	                    $html = PerchUtil::text_to_html($raw);

	                    $fields = array();
	                    $fields['excerpt'] = array();

	                    if ($format=='textile') {
							$fields['excerpt']['raw']       = $raw;
	                    	$fields['excerpt']['processed'] = $html;
	                    }else{
	                    	$fields['excerpt']['raw']       = $html;
	                    	$fields['excerpt']['processed'] = $html;
	                    }

	                    $post['postDynamicFields'] = PerchUtil::json_safe_encode($fields);


	                    break;
	            }
	        }
	        
	        	                
	        // Create the post
	        $Post = $Posts->create($post);
	        
	        if (is_object($Post)) {

	        	$out[] = array('type'=>'success',
									'messages'=>array(
											'Post ' . $Post->postTitle(),
											'Successfully imported'
										));

	            
	            // CATEGORIES AND TAGS
	            $Categories = new PerchBlog_Categories($this->api);
	            $Tags = new PerchBlog_Tags($this->api);

	            $postTags = array();
	            $cat_ids  = array();
	        
	            foreach($item->category as $category) {
	                
	                $attributes = $category->attributes();
	                
	                $slug = (string) $attributes['nicename'];
	                $label = (string) $category;
	                
	                switch((string)$attributes['domain']) {
	                    case 'post_tag':
	                        $Tag = $Tags->find_or_create($slug, $label);
	                        if (is_object($Tag)) {
	                            $postTags[] = $Tag->tagSlug();

	                            $out[] = array('type'=>'success',
									'messages'=>array(
											'Tag ' . $Tag->tagSlug(),
											'Successfully imported'
										));
	                        }
	                        break;
	                        
	                    case 'category':
	                        $Category = $Categories->find_or_create($slug, $label);
	                        if (is_object($Category)) {
	                            $cat_ids[] = $Category->id();

	                            $out[] = array('type'=>'success',
									'messages'=>array(
											'Category ' . $label,
											'Successfully imported'
										));
	                        }
	                        break;   
	                }
	            }
	            
	            if (PerchUtil::count($postTags)) {
	            	$post['postTags'] = implode(', ', $postTags);
	            }

	            if (PerchUtil::count($cat_ids)) {
	            	$post['cat_ids'] = $cat_ids;
	            }

	            $Post->update($post);
	            
	            
	            // COMMENTS
	            $Comments = new PerchBlog_Comments($this->api);
	            foreach($item->children('wp', true) as $tag) {
	                $tagName = $tag->getName();

	                if ($tagName == 'comment') {
	                    
	                    if ((string)$tag->comment_type=='pingback') {
	                        continue; // this is a pingback, so skip it.
	                    }
	                    
	                    $html = PerchUtil::text_to_html((string)$tag->comment_content);
	                    
	                    $comment = array();
	                    $comment['postID']            = $Post->id();
	                    $comment['commentName']       = (string) $tag->comment_author;
	                    $comment['commentEmail']      = (string) $tag->comment_author_email;
	                    $comment['commentURL']        = (string) $tag->comment_author_url;
	                    $comment['commentIP']         = ip2long((string) $tag->comment_author_IP);
	                    $comment['commentDateTime']       = (string) $tag->comment_date_gmt;
	                    $comment['commentHTML']       = $html;

	                    if ((string)$tag->comment_approved == '1') {
	                        $comment['commentStatus'] = 'LIVE';                        
	                        $Comment = $Comments->create($comment);


	                        $out[] = array('type'=>'success',
									'messages'=>array(
											'Comment from ' . $comment['commentName'],
											'Successfully imported'
										));
	                    }
	                    
	                }
	            }

	            $Post->update_comment_count();
	            
	        }
	        
	        

	        
	        
	    }	    

	    return $out;
	}

}


?>