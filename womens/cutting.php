<?php 
  error_reporting(0);
	$page_title = "Cutting";
	$page_type = "Womens";
	include('../inc/head.php');
	include('../inc/top.php');
?>

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2>Cutting</h2>
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
	    	<div class="nivo3">
				<div id="slider">
				<?php perch_content('Gallery Images'); ?>
				</div>
				</div>
				<?php perch_content('Main Content'); ?>
				<?php perch_content('Price List Link'); ?>

	    </div>
    <!-- /Left Content --> 
    <!-- Sidebar --> 

<?php include('../inc/womens-rhs.php'); ?>
    <!-- /Sidebar --> 

    <br class="clear" /> 
    <!-- /Main content --> 
  </div> 
  <div class="bottom_main"></div> 
</div> 
<!-- /MAIN -->
<?php
include('../inc/footer.php');
?>