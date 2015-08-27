<?php
  error_reporting(0);
	$page_title = "Blog";
	include('../inc/head.php');
	include('../inc/top.php');
?>
	

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2><a href="/blog/">Blog</a></h2>
  </div>
</div>
<!-- /LOCATION -->
<!-- MAIN --> 
<div id="main" class="blog blogListing"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
    <!-- Main content --> 

       <!-- Left Content 590 --> 
     <div class="left_content_590"> 
        <?php 
          perch_blog_recent_posts(5);
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
   <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '4hair'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
<?php
include('../inc/footer.php');
?>