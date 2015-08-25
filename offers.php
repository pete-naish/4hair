<?php 
	$page_title = "Offers";
	$custom_css ="y";
	include('inc/head.php');
	include('inc/top.php');
?>

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2>Offers</h2>
  </div>
</div>
<!-- /LOCATION -->
<!-- MAIN --> 
<div id="main"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
    <!-- Main content --> 
    <!-- Left Content 590 --> 
    <div class="left_content_590"> 
        
		<?php perch_content('Offers'); ?>


    </div> 
    <!-- /Left Content --> 
    <!-- Sidebar --> 
    <div id="sidebar"> 
      <div class="line"></div> 
			
      <!-- container --> 
      <div class="container"> 
			<ul>
				<li><a href="/offers-rss" class="rss" alt="RSS feeds allow you to receive updates directly to your device or reader" title="RSS feeds allow you to receive updates directly to your device or reader">Subscribe to the Offers RSS Feed</a></li>
			</ul>
			<div class="separator"></div>
 				<?php
				include('inc/social.php');
				?>
				<?php perch_content('Sidebar Video'); ?>
	      </div>
      <!-- /container --> 

<div class="bottom_line"></div>

      
    </div> 

    <!-- /Sidebar --> 
    <br class="clear" /> 
    <!-- /Main content --> 
  </div> 
  <div class="bottom_main"></div> 
</div> 
<!-- /MAIN -->
<?php
include('inc/footer.php');
?>