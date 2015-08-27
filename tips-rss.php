<?php 
    error_reporting(0);
	include('cms/runtime.php');
	echo '<'.'?xml version="1.0"?'.'>';
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
			<atom:link href="<?php perch_content('url'); ?>/tips-rss.php" rel="self" type="application/rss+xml" />
        <title>4 Hair Styling Tips</title>
        <link><?php perch_content('url'); ?>/styling-tips</link>
        <description>Watch hot styling tips from 4 Hair</description>
				<?php
					$opts = array(
						'page'=>'/styling-tips.php',
						'template'=>'_tips_rss_item.html'
					);
					perch_content_custom('Style Tip', $opts);
				?>
    </channel>
</rss>