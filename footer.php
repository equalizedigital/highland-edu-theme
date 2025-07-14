<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Student Portal Page
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	$parallax_bg3           = get_theme_mod( 'highlight_pic_three' );
?>

<div class="clear"></div>
<footer>
<div>

    <? if (!is_page(2)) { ?>
        <div class="super-container footer-apply-area">
            <div class="container">
                <div class="footer-apply-online">
                    <p>your future begins here</p>
                    <div class="footer-button-holder button-holder">
                        <a href="<? echo get_permalink(296);?>" class="orng-btn">Apply Online</a>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>

    <div class="literal super-container map-area parallax-area">
        <div class="container">
            <div class="address">
                <h2>Highland Campus</h2>
                <p class="street">2998 W. Pearl City Rd. Freeport, IL 61032</p>
                <p class="phone"><a href="tel:815.235.6121">815.235.6121</a></p>
                <div class="map-button-holder">
                    <div class="button-holder">
                        <a href="<? echo get_permalink(5465);?>" class="orng-btn">Get Directions</a>
                    </div>
                    <div class="button-holder">
                        <a href="<? echo get_permalink(12);?>" class="drk-blue-btn">Contact Us</a>
                    </div>
                </div>
            </div>
        </div><!-- container -->
    </div><!-- super-container -->

    <div class="super-container footer-wrapper">
        <div class="container">
            <div class="social-outer">
                <div class="footer-logo">
                    <img src="<? bloginfo('template_url'); ?>/images/logo.jpg" alt="Highland Community College logo. Located in Northwest Illinois" />
                </div>
                <div class="social-holder">
                   
                    <div class="social-icons-wrapper">
                        <ul class="social-icons">
                            <li>
                                <a href="https://www.facebook.com/highlandcommunitycollege" aria-label="Facebook">
                                    <img src="<? bloginfo('template_url'); ?>/images/fb.png" alt="Facebook" />
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/highlandcollege" aria-label="Twitter">
                                    <img src="<? bloginfo('template_url'); ?>/images/twtr.png" alt="Twitter" />
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCGWiarYnk5KB4QOMkv5rAnw" aria-label="YouTube">
                                    <img src="<? bloginfo('template_url'); ?>/images/yt.png" alt="YouTube" />
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/explore/locations/1720635/highland-community-college/?hl=en" aria-label="Instagram">
                                    <img src="<? bloginfo('template_url'); ?>/images/instagram.png" alt="Instagram" />
                                </a>
                            </li>
                       </ul>
                    </div>
					
                </div>
				
            </div>
            <div class="footer-menu">
                <div class="left-menu">
                    <? wp_nav_menu( array( 'theme_location' => 'footer-left' ) ); ?>
                </div>

                <? get_template_part('select', 'menu-footer'); ?>
            </div>
            <div class="footer-logos">
                <div class="button-holder">
                    <a href="<? echo get_permalink(10505);?>" class="blue-btn">employment</a>
                </div>
                <div class="button-holder">
                    <a href="<?php echo esc_url('https://host.nxt.blackbaud.com/adaptive-donor-form/?formId=11ce7f33-4edc-4324-89dc-ca1340f390a8&envid=p-irD7br1Nx0q8NbgJjJn5Bw&zone=usa'); ?>" class="blue-btn">Give</a>
                </div>
                <img src="<? bloginfo('template_url'); ?>/images/support_our_vets.jpg" alt="Supporting our veterans." />
            </div>
			 <div class="copy">
                        <p>&copy; <? echo date('Y'); ?> Highland Community College</p>
                    </div>
        </div><!-- container -->
    </div><!-- super-container -->

<script type="text/javascript">
	jQuery(window).load(function(){
		if( !isMobile.iOS()) {
			jQuery('.parallax-area').addClass('do-parallax');
		}
	});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/includes/slick/slick.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/includes/slick-launcher.js"></script>

<script>
	var acc = document.getElementsByClassName("accordion");
	var acc2 = document.getElementsByClassName("callout-header");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			//commented this out to add animation via css with max-height
            /*
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
            */
		});
	}
	if(jQuery(window).width() < 481) {
		for (i = 0; i < acc2.length; i++) {
			acc2[i].addEventListener("click", function () {
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			});
		}
	}
</script>
<script type="text/javascript" src="https://imageserver.ebscohost.com/branding/tabbedsearch/js/simpletabs_1.3.packed.js"></script>
<script type="text/javascript" src="https://imageserver.ebscohost.com/branding/tabbedsearch/js/roundies.js"></script>
<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/stylesheets/simpletabs.css">


<?
	include_once('includes/fancy_loader.php');
	include_once('includes/slicknav_loader.php');
	if(isset($post->ID)) {
        $call_tracking_code = get_post_meta($post->ID, '_cmb_call_report_tracking_code', true);
        $foot_script = get_post_meta($post->ID, '_cmb_tracking_code', true);
    }
	$sitewide_scripts = get_theme_mod( 'sitewide_tracking_code');

	wp_footer();

	if(!empty($call_tracking_code)){
	    echo $call_tracking_code;
	}
	if(!empty($sitewide_scripts)){
	    echo $sitewide_scripts;
	}
    if(!empty($foot_script)){
        echo $foot_script;
    }
?>
</div>
</footer>
</body>
</html>