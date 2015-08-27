<?php if($page_title=="Womens" || $page_type=="Womens" || $page_title=="Error" || $page_title=="Blog" || $blog_title=="Blog")
include('../cms/runtime.php');
else
include ('cms/runtime.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://opengraphprotocol.org/schema/"
xmlns:fb="http://ogp.me/ns/fb#">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php perch_blog_post_field($_GET['s'], 'postTitle'); print $page_title ?> &#124; 4 Knebworth</title>
<?php perch_content('Page Details'); ?>

<!-- METAS -->
<meta name="author" content="" />
<meta name="robots" content="index, follow" />
<meta name="revisit-after" content="14 days" />
<meta name="language" content="en-GB" />
<!-- EjL6vgrGYRxLHzScO7Bp2tzfLio -->
<!-- CSS -->
<link rel="stylesheet" type="text/css" media="all" href="/css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="/css/main.css" />
<link rel="stylesheet" type="text/css" media="all" href="/css/theme.css" />
<link rel="stylesheet" type="text/css" media="all" href="/css/nivo-slider.css" />
<link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css" media="screen" /> 
<?php
if ($custom_css=="y") print "<link rel='stylesheet' href='/css/$page_title.css' type='text/css' media='screen' />";
?>
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" media="all" href="/css/ie8.css" />
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="/css/ie7.css" />
<![endif]-->

<link rel="icon" type="image/x-icon" href="/images/favicon.ico" />
<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
<link rel="apple-touch-icon-precomposed" href="/images/apple-touch-icon-precomposed.png" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="/offers-rss.php" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="/tips-rss.php" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="/js/cufon-yui.js"></script>
<script type="text/javascript" src="/js/droid_400.font.js"></script>
<script type="text/javascript" src="/js/droiditalic_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h2, h3, h4, .cufon',{ hover: true, fontFamily: 'droid' });
	Cufon.replace('.italic',{ hover: true, fontFamily: 'droiditalic' });
	// Analytics
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-16479704-6']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
</head>
