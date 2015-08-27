<?php 
    error_reporting(0);
	$page_title = "Blog Archive";
  $blog_title = "Blog";
	include('../inc/head.php');
	include('../inc/top.php');
?>
	

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2><a href="/blog/">Blog</a> / Archive</h2>
  </div>
</div>
<!-- /LOCATION -->
<!-- MAIN --> 
<div id="main" class="blogListing blog"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
    <!-- Main content --> 

       <!-- Left Content 590 --> 
     <div class="left_content_590"> 
        <?php 
            // CHANGE MODE DEPENDING ON WHAT OPTIONS ARE PASSED IN ON THE QUERYSTRING
            
            // Default mode
            $mode = 'date';
            $date_from  = date('Y-01-01 00:00:00');
            $date_to    = date('Y-12-31 23:59:59');
            
            
            // Category?
            // if (perch_get('cat')) {
            //     $mode = 'category';
            //     $categorySlug = perch_get('cat');
            //     $categoryTitle = perch_blog_category($categorySlug, true);
            //     echo '<h1>Archive of: '.$categoryTitle.'</h1>';
            // }
            
            // Tag?
            if (perch_get('tag')) {
                $mode = 'tag';
                $tagSlug = perch_get('tag');
            }
            
            // Year?
            if (perch_get('year')) {
                $mode = 'date';
                $year = intval(perch_get('year'));
                $date_from  = $year.'-01-01 00:00:00';
                $date_to    = $year.'-12-31 23:59:59';
                
                
                // Month and Year?
                if (perch_get('month')) {
                    $month = intval(perch_get('month'));
                    $date_from  = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-01 00:00:00';
                    $date_to    = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-31 23:59:59';
                }
            }
            
            
            // NOW WE KNOW WHAT MODE, LET'S DO THE PERCH STUFF
            
            
            switch($mode) 
            {
                // case 'category':
                //     $opts = array(
                //         'category'=>rtrim($categorySlug, '/')
                //         );
                //     break;
                    
                case 'tag':
                    $opts = array(
                        'tag'=>rtrim($tagSlug, '/')
                        );
                    break;
                    
                case 'date':
                    $opts = array(
                        'filter'=>'postDateTime',
                        'match'=>'eqbetween',
                        'value'=>$date_from.','.$date_to
                        );
                    break;
                    
                
                
            }
            
            // show 10 items per page
            $opts['count'] = 10;
            
            // order by date, newest to oldest
            $opts['sort'] = 'postDateTime';
            $opts['sort-order'] = 'DESC';
            
            $opts['template'] = 'post_in_list.html';
            
            perch_blog_custom($opts);
        ?>

      </div>
            <!-- /Left Content --> 
            <!-- rhs -->
                <div id="sidebar"> 
                  <div class="line"></div> 
                  <!-- container --> 
                  <div class="container">  
                    <!-- The following functions are different ways to display archives. You can use any or all of these. 
                    
                    All of these functions can take a parameter of a template to overwrite the default template, for example:
                    
                    perch_blog_categories('my_template.html');
                    
                    --> 
                    <!--  By category listing -->
                    <?php
                    // perch_blog_categories();
                    ?>
                    <!--  By tag -->
                    <?php perch_blog_tags(); ?>
                    <!--  By year -->
                    <?php perch_blog_date_archive_years(); ?>
                    <!--  By year and then month - can take parameters for two templates. The first displays the years and the second the months see the default templates for examples -->
                    <!-- perch_blog_date_archive_months(); -->
                  </div> 
                  <!-- /container --> 
                  <div class="bottom_line"></div> 
                </div>
            <!-- /rhs -->
    <br class="clear" /> 
    <!-- /Main content --> 
  </div> 
  <div class="bottom_main"></div> 
</div> 
<!-- /MAIN -->
<?php
include('../inc/footer.php');
?>