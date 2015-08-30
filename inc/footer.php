
<!-- COLOR BOTTOM -->
<div id="main_bottom"><div class="content"></div></div>
<!-- /COLOR BOTTOM -->

<!-- FOOTER -->
<div id="footer">
    <div class="content">
    	
        <!-- Logo bottom -->
        <div id="logo_bottom">
																							
												
								<a href="http://visitor.r20.constantcontact.com/d.jsp?llr=jzdrqxcab&amp;p=oi&amp;m=1102448201513" title="Newsletter Signup" target="_blank" style="-webkit-text-size-adjust:none;">Sign up for our newsletter to get exclusive offers!</a>

        </div>
        <!-- /Logo bottom -->
                
        <!-- MEMU BOTTOM -->
				<div id="footer_menu">
				<?php
				include('nav.php');
				?>
        </div>
        <!-- /MEMU BOTTOM -->
                

        
        <div class="separator"></div>
        
        <!-- Footer dynamic -->
        <div class="footer_dynamic">
        
            <!-- Left Part -->
            <div class="left_part_footer">
                
                <!-- about -->
                <div class="about_quick">

											<p class="opening-hours"><a class="opening-hours-tip" href="/contact#opening-hours" onclick="return false;">Opening Hours</a></p>
                </div>
                <!-- /about -->
                
                
                <div class="separator"></div>
                
                <ul class="list_2_3">
                <li class="icon_email"><a href="mailto:<?php perch_content('Email Address'); ?>"><?php perch_content('Email Address'); ?></a></li>
                <li class="icon_phone"><?php perch_content('Phone Number'); ?></li>
                <li class="icon_address"><?php perch_content('Address'); ?></li>
                </ul>
                <ul class="list_1_3">
								<?php perch_content('Price List Link'); ?>
                <li class="icon_facebook"><a href="<?php perch_content('Facebook Link'); ?>">Facebook</a></li>
                <li class="icon_twitter"><a href="http://twitter.com/<?php perch_content('Twitter User'); ?>">Twitter</a></li>
                <!-- <li class="icon_vimeo"><a href="<? perch_content('Vimeo Link'); ?>">Vimeo</a></li> -->
								<li class="icon_rss"><a href="/tips-rss" title="RSS feeds allow you to receive updates directly to your device or reader">Style Tips</a></li>
								<li class="icon_rss"><a href="/offers-rss" title="RSS feeds allow you to receive updates directly to your device or reader">Offers</a></li>
                </ul>
                <br class="clear" />
            
                
            </div>
            <!-- /Left Part -->
            
            <!-- Right Part -->
            <div class="right_part_footer">

                <!-- Twitter update-->
				        <div id="twitterUpdate">
				            <div id="tweeter"><?php perch_content('Twitter User'); ?></div>
				            <div id="deadTweets" class="droid">
				                <p><img src="/images/loadingTweets.gif" alt="" /> Loading...</p>
				            </div>
				        </div>
				        <!-- /Twitter update -->
            	<div id="fb-root" class="hide"></div>

							<fb:like href="http://www.facebook.com/pages/4-Hair/168339339846806" send="false" width="410" show_faces="false" colorscheme="dark"></fb:like>
            <br class="clear" />
                
            </div>
            <!-- /Right Part -->
        
        
        <br class="clear" />
        </div>
        <!-- /Footer dynamic -->
                


    </div>
</div>
<div class="hide">
<?php
 include ("opening-hours.php");
?>	
	</div>
<!-- /FOOTER -->

<!-- COLOR BOTTOM -->
<div id="gotop">
    <div class="content">
    	<div class="button"><a href="#top"><span class="inv">Go Top</span></a></div>
    </div>
</div>
<!-- /COLOR BOTTOM -->

</div>
<?php
include('scripts.php');
?>
</body>
</html>