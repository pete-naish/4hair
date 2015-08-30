<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/json.js"></script>
<script type="text/javascript" src="/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="/js/twitter.js"></script>
<script type="text/javascript" src="/js/hoverIntent.js"></script>
<script type="text/javascript" src="/js/qtip.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/masonry.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<?php
if ($page_title=="Contact") print "<script type='text/javascript' src='/inc/contact-app/js/init.php'></script>\n<script type='text/javascript' src='http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAALiNILSO059QjxcTd7_OBOxRv-VDoe8LyKY6pccKCPzEfBgmvKBQZWDDY5KkdaPDPeJuSCT8e1rsKLA'></script>\n<script type='text/javascript' src='/js/gmaps.js'></script>";
?>

<script type="text/javascript" src="/js/defaultText.js"></script>
<script type="text/javascript">
	//<![CDATA[
	//Nivo Settings
  $(window).load(function() {
  	$('#slider').nivoSlider({
			effect:'fade',
			slices:1,
			animSpeed:500,
			pauseTime:4000,
			directionNav:false,
			directionNavHide:true,
			controlNav:false
		});
  });
	
	//Init prettyPhoto
	$(document).ready(function() {	
		$("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'light_square'}); 
	});

	//Set title for ios
	if( navigator.userAgent.match(/iPhone/i) || 
		  navigator.userAgent.match(/iPod/i) || 
		  navigator.userAgent.match(/iPad/i)
		)
	{document.title = "4 Knebworth";}

	//Init defaultText
	$(function() {	
		$("#ea").defaultText('email address'); 
	});

	//Init qtip
	$('.opening-hours-tip').qtip({
		content: { 
			text: $('.hide .hours'),
			prerender: true
		},
		show: 'click',
		hide: {
			when: 'unfocus'
		},
		style: {
			name: 'dark',
			tip: 'bottomMiddle'
		},
		position: {
				corner: {
					target: 'topMiddle',
					tooltip:'bottomMiddle'
				}
		}
	});
	
	//Cufon replace

	Cufon.now();

	//   // GOOGLE MAP INTEGRATION
	$(document).ready(function() { 
	    $('#google_map').googleMaps({
				scroll: false,  
				depth: 14,
	      latitude: 51.865302,
	      longitude: -0.182884,
			  markers: {
	           latitude: 51.865302,
	           longitude: -0.182884,
	           info: {
	               layer: '#address'
	           }
	       }
	    }); 
	});
	
	$('.blockWrapper').masonry({
		itemSelector: '.block_icon',
		columnWidth: 460
	});


	// Facebook Like
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) {return;}
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#appId=263769803645494&xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	
	//]]>
</script>