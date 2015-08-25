
<?php 
	$blog_title = "Blog";
	include('head.php');
	include('top.php');
?>
	
<!-- LOCATION -->
<div id="location">
  <div class="content">
	<h2><a href="/blog/">Blog</a> /  
		<?php 
			perch_blog_post_field($_GET['s'], 'postTitle');
		?>


		
	</h2>
  </div>
</div>
<!-- /LOCATION -->
<!-- MAIN --> 
<div id="main" class="blog"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
	<!-- Main content --> 
	<!-- Fullwidth --> 
		  <div class="left_content_590"> 
			 <div class="post">
			<?php perch_blog_post($_GET['s']); ?>
			<?php perch_blog_post_tags(perch_get('s')); ?>
			</div>
			    <div id="disqus_thread"></div>
			    <script type="text/javascript">
			        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			        var disqus_shortname = '4hair'; // required: replace example with your forum shortname

			        /* * * DON'T EDIT BELOW THIS LINE * * */
			        (function() {
			            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			        })();
			    </script>
			    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
			    
			<?php 
			// perch_blog_post_comments(perch_get('s'), array(
		 //    			'count'=>10
		 //    	)); 
		    	?>
		    	
		    	<?php 
		    	// perch_blog_post_comment_form(perch_get('s')); 
		    	?>
			<a href="javascript:window.history.back();"> &lt; Back</a>

		</div>


	<!-- /Fullwidth --> 
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

<?php
include('footer.php');
?>