<?php 
	$page_title = "Error";
	include('head.php');
	include('top.php');
?>

<!-- LOCATION -->
<div id="location">
  <div class="content">
    <h2>500 Error - Server Error</h2>
  </div>
</div>
<!-- /LOCATION -->

<!-- MAIN --> 
<div id="main"> 
  <div class="top_main"></div> 
  <div class="middle_main"> 
    <!-- Main content --> 
		<div id="error-page">
			<h2>Oh No! Something went wrong on the server!</h2>
			<p>Try going <a href="/">Home</a>, or <a href="javascript:history.go(-1)">back to the previous page</a>, and try again!</p>
		</div>
    <br class="clear" /> 
    <!-- /Main content --> 
  </div> 
  <div class="bottom_main"></div> 
</div> 
<!-- /MAIN -->
<?php
include('footer.php');
?>