<?php 
	$page_title = "Home";
	include('head.php');
	include('top.php');
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
<div id="main" class="home">
<div class="top_main"></div>
<div class="middle_main">
<!-- Main content -->

    <!-- HOME SLOGAN -->
		<?php perch_content('Tagline'); ?>
    <!-- /HOME SLOGAN -->
		<div class="flash"><a rel="prettyPhoto" href="https://hairtek.mylocalsalon.com/onlinebooking?iframe=true&amp;width=875&amp;height=710">You can now book your appointments online! Click here to book in minutes!</a></div>
		<div class="blockWrapper">
		<?php perch_content('Content Blocks'); ?>
        </div>
        
    <br class="clear" />
    <div class="separator"></div>
    <br class="clear" />
		<h4 class="styling-tips"><a href="/styling-tips">Styling Tips</a></h4>
		<?php perch_content('Styling Tips Intro'); ?>
		<?php
        $opts = array(
            'page'=>'/styling-tips.php',
            'template'=>'_styling_tips_home.html',
            'sort-order'=>'DESC',
            'count'=>3
        );
        
        perch_content_custom('Style Tip', $opts);
    
    ?>
<a href="/styling-tips" class="right" style="clear:both; display:block;">See more styling tips...</a>
<br class="clear" />

<div class="separator"></div>
<br class="clear" />
<h4 class="styling-tips"><a href="/offers">Latest Offer</a></h4>
<?php
    $opts = array(
        'page'=>'/offers.php',
        'template'=>'_offers_home.html',
        'sort-order'=>'DESC',
        'count'=>1
    );
    
    perch_content_custom('Offers', $opts);

?>
<br class="clear" />


<!-- /Main content -->
</div>
<div class="bottom_main"></div>
</div>
<!-- /MAIN -->
<?php
include('footer.php');
?>