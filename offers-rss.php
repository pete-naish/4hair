<?php 
	include('cms/runtime.php');
	echo '<'.'?xml version="1.0"?'.'>';
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
			<atom:link href="<?php perch_content('url'); ?>/offers-rss.php" rel="self" type="application/rss+xml" />
        <title>4 Hair Offers</title>
        <link><?php perch_content('url'); ?>/offers</link>
        <description>Grab the latest offers from 4 Hair</description>
				<?php
					$opts = array(
						'page'=>'/offers.php',
						'template'=>'_offers_rss_item.html'
					);
					perch_content_custom('Offers', $opts);
				?>
    </channel>
</rss>