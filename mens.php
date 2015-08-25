<?php 
	$page_title = "Mens";
	include('inc/head.php');
	include('inc/top.php');
?>

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2>Men's</h2>
  </div>
</div>
<!-- /LOCATION -->
<!-- MAIN --> 
<div id="main"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
    <!-- Main content --> 
    <!-- Fullwidth --> 
		  <div class="fullwidth">
			<div class="nivo2">
			<div id="slider">
			<?php perch_content('Gallery Images'); ?>
			</div>
			</div>
		<?php perch_content('Main Content'); ?>
		</div>
    <!-- /Fullwidth --> 
    <br class="clear" /> 
    <!-- /Main content --> 
  </div> 
  <div class="bottom_main"></div> 
</div> 
<!-- /MAIN -->
<?php
include('inc/footer.php');
?>