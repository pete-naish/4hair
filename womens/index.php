<?php 
    error_reporting(0);
	$page_title = "Womens";
	include('../inc/head.php');
	include('../inc/top.php');
?>

<!-- SLIDER -->
<div id="slider_home">
    <div class="content">
    
    <!-- nivo_slider -->
    <div class="nivo">
        <div id="slider" class="nivoSlider">
            <?php perch_content('Gallery Images'); ?>
        </div>
    </div>
    <!-- /nivo_slider -->
    
    </div>
</div>
<!-- /SLIDER -->


<!-- MAIN -->
<div id="main">
<div class="top_main"></div>
<div class="middle_main">
<!-- Main content -->

<!-- HOME SLOGAN -->
<?php perch_content('Tagline'); ?>
<!-- /HOME SLOGAN -->

    <div class="blockWrapper">
    <?php perch_content('Content Blocks'); ?>
    <br class="clear" />
    </div>
    
    <br class="clear" />

<!-- /Main content -->
</div>
<div class="bottom_main"></div>
</div>
<!-- /MAIN -->
<?php
include('../inc/footer.php');
?>