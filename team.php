<?php 
	$page_title = "Team";
	include('head.php');
	include('top.php');
?>


<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2>The Team</h2>
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
<br class="clear" />
<br />
<!-- ITEMS -->
<div class="list">

<ul id="portfolio-list" class="display">
  
  <?php perch_content('Team Members'); ?>


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