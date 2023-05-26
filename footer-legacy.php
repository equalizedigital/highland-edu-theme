<?
    defined('ABSPATH') OR exit;
    /**
     * Template Name: Student Portal Page
     * @package WordPress
     * @subpackage WP-Skeleton
     */
?>

<footer>
    <div class="super-container footer-wrapper">
        <div class="container">
            <div class="sixteen columns">
                <div class="one-half column footer-logo">
                    <img src="<? bloginfo('template_url'); ?>/images/legacy_logo.png" alt="Highland College Logo." />
                </div>
                <div class="one-half column all-here">
                    <img src="<? bloginfo('template_url'); ?>/images/social_header.png" alt="It's all here." />
                </div>
            </div>
            <div class="sixteen columns">
                <div class="one-half column address">
                    <p>Highland Community College</p>
                    <p>2998 W. Pearl City Rd.</p>
                    <p>Freeport, IL 61032</p>
                    <p><a href="tel:8152356121">815.235.6121</a></p>
                </div>
                <div class="one-half column all-here-mobile">
                    <img src="<? bloginfo('template_url'); ?>/images/social_header.png" alt="It's all here." />
                </div>
                <div class="one-half column social-icons">
                    <a href="https://www.facebook.com/highlandcommunitycollege" target="_blank" role="button" aria-label="Facebook Link">
                        <img src="<? bloginfo('template_url'); ?>/images/fb_icon.png" alt="Facebook Icon" />
                    </a>
                    <a href="https://twitter.com/highlandcollege" target="_blank" role="button" aria-label="Twitter Link">
                        <img src="<? bloginfo('template_url'); ?>/images/tw_icon.png" alt="Twitter Icon" />
                    </a>
                    <a href="https://www.youtube.com/channel/UCGWiarYnk5KB4QOMkv5rAnw" target="_blank" role="button" aria-label="YouTube Link">
                        <img src="<? bloginfo('template_url'); ?>/images/yt_icon.png" alt="YouTube Icon" />
                    </a>
                    <a href="https://www.instagram.com/explore/locations/1720635/highland-community-college/?hl=en" target="_blank" role="button" aria-label=Instagram Link"">
                        <img src="<? bloginfo('template_url'); ?>/images/ig_icon.png" alt="Instagram Icon" />
                    </a>
                </div>
            </div>
        </div><!-- container -->
    </div><!-- super-container -->
    <div class="super-container" id="copyright">
        <div class="container">
            <div class="sixteen columns social-holder">
                <div class="copy">
                    <p>&copy; <? echo date('Y'); ?> Highland Community College</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?
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

</body>
</html>