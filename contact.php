<?php 
	$page_title = "Contact";
	$custom_css = "y";
	include 'inc/contact-app/headers.php';
	include('inc/head.php');
	include('inc/top.php');
?>
<div id="address" class="hide"><?php perch_content('Address'); ?></div>
<!-- SLIDER -->
<div id="slider_home">
    <div class="content">
    
    <!-- nivo_slider -->
    <div class="nivo">
        <div id="non-slider">
					<div id="google_map"></div>
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
    <!-- Left Content 590 --> 
    <div class="left_content_590"> 
      
      <h3>Get in touch</h3> 
      
      
                        
                        <!-- Form --> 
												<?php include 'inc/contact-form.php'; ?>
      
    </div> 
    <!-- /Left Content --> 
    <!-- Sidebar --> 
    <div id="sidebar"> 
      <div class="line"></div> 
      <!-- container --> 
      <div class="container"> 
        <h4>Contact Information</h4> 
        <p><strong>Address: </strong><br/><?php perch_content('Address'); ?><br/>
          <strong>Phone: </strong><?php perch_content('Phone Number'); ?><br /> 
          <strong>Email: </strong><a href="mailto:<?php perch_content('Email Address'); ?>"><?php perch_content('Email Address'); ?></a></p> 
					<div class="separator"></div>
					<h4 id="opening-hours">Opening Hours</h4>
					<?php
					include('inc/opening-hours.php');
					?>
        <div class="separator"></div> 
				<?php
				include('inc/social.php');
				?>
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