<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<a id="hide_me" href="#main-content">Skip to Content</a>

<div role="banner">
    <div class="logo">
        <a href="<? bloginfo('url'); ?>" tabindex="0" title="Link to the homepage.">
            <img src="<? bloginfo('template_url'); ?>/images/logo.jpg" alt="Highland Community College. Located in Northwest Illinois"/>
        </a>
    </div>

    <div class="super-container menu-holder" role="navigation">
        <div class="super-container top-menu-holder">
            <div class="container">
                <div class="sixteen columns top-nav-holder" id="top_nav">
                    <!-- Search Icom -->    
                    <div class="search-icon">
                        <a href="<? echo get_permalink(5461); ?>">
                            <img src="<? bloginfo('template_url'); ?>/images/search_icon.png" alt="Search"/>
                        </a>
                    </div>
                    <!--  the Menu -->
                    <? 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'topnav',
                            'walker' => new topNavWalker()
                        ),
                    ); ?>
                </div>
            </div>
        </div>

        <div class="super-container bot-menu-holder">
            <div class="container primary-nav-wrapper">
                <div class="sixteen columns alpha omega primary-nav-holder">
                    <div id="access">
                        <?
                        wp_nav_menu(array('theme_location' => 'primary'));
                        wp_nav_menu( array( 'menu' => 'main-nav-1', 'menu_id' => 'admissions-subs-actuator', 'menu_class' => 'menu-main-menu', 'container' => false, 'walker' => new admissionsWalker() ) );
                        wp_nav_menu( array( 'menu' => 'main-nav-2', 'menu_id' => 'academics-subs-actuator', 'menu_class' => 'menu-main-menu', 'container' => false, 'walker' => new academicsWalker() ) );
                        wp_nav_menu( array( 'menu' => 'main-nav-3', 'menu_id' => 'athletics-subs-actuator', 'menu_class' => 'menu-main-menu', 'container' => false ) );
                        wp_nav_menu( array( 'menu' => 'main-nav-4', 'menu_id' => 'campus-subs-actuator', 'menu_class' => 'menu-main-menu', 'container' => false, 'walker' => new campusWalker() ) );
                        wp_nav_menu( array( 'menu' => 'main-nav-5', 'menu_id' => 'arts-subs-actuator', 'menu_class' => 'menu-main-menu', 'container' => false, 'walker' => new artsWalker() ) );
                        get_template_part('submenu', 'admissions');
                        get_template_part('submenu', 'academics');
                        //get_template_part('submenu', 'athletics');
                        get_template_part('submenu', 'campus');
                        get_template_part('submenu', 'arts');
                        ?>
                    </div><!-- access -->
                </div><!-- menu-holder -->
            </div>
        </div>
        <div class="super-container" id="slicknav_holder"></div>
    </div>
</div>
                            
<div class="social-butterfly sb-inner" aria-label="social media" role="complimentary">
    <?php get_template_part( 'social','butterfly'); ?>
</div>
<?

    global $alert_list;
    $alert_list  = get_theme_mod( 'alert_list');
    if ($alert_list) {
        get_template_part('alert');
    }

    if (is_front_page()) {
    	get_template_part('slideshow');
    }

    if(is_page(166436)){
        get_template_part('slideshow');
    }
?>