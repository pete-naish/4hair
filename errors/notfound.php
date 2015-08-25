<?php 
	$page_title = "Error";
	include('../inc/head.php');
	include('../inc/top.php');
?>

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2>404 Error - Page Not Found</h2>
  </div>
</div>
<!-- /LOCATION -->
<!-- MAIN --> 
<div id="main"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
    <!-- Main content --> 
		<div id="error-page">
			<h2>Oops! Page Not Found</h2>
			<p>I couldn't find the page you were looking for!</p>
			<p>Try going <a href="/">Home</a>, or <a href="javascript:history.go(-1)">back to the previous page</a>, maybe you'll find your way!</p>
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