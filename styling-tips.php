<?php 
	$page_title = "Styling Tips";
	include('head.php');
	include('top.php');
?>

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2>Styling Tips</h2>
  </div>
</div>
<!-- /LOCATION -->
<!-- MAIN --> 
<div id="main"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
    <!-- Main content --> 
 
<!-- PORTFOLIO --> 
<div id="portfolio"> 
 	<!-- Filter --> 
	<div class="filter"> 

	<div id="portfolio-filter"> 
	<p class="cufon left">You will find here a growing gallery of styling videos from the team at 4. As well as special events, tips and tricks of the trade, this is also the place to watch our very own "How to create this look" videos.</p>
	<p class="cufon right"><a href="/tips-rss.php" class="rss" alt="RSS feeds allow you to receive updates directly to your device or reader" title="RSS feeds allow you to receive updates directly to your device or reader">Subscribe to the Styling Tips RSS feed</a></p>
	<p class="cufon left">Hover over the thumbnails below and click the play button.</p>
	
	</div> 

	</div> 
	<!-- /Filter -->
<br class="clear" /> 
<!-- ITEMS --> 
<div class="grid"> 
 
<ul id="portfolio-list" class="display"> 
<?php perch_content('Style Tip'); ?>
</ul> 
 
</div> 
<!-- /ITEMS --> 
 
 
</div> 
<!-- /PORTFOLIO --> 
 
    <br class="clear" /> 
    <!-- /Main content --> 
  </div> 
  <div class="bottom_main"></div> 
</div> 
<!-- /MAIN -->
<?php
include('footer.php');
?>