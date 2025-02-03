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
                    <!--  the Menu -->
                    <nav class="menu-topnav-container" aria-label="Header Utilities">
                    <? 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'topnav',
                            'walker' => new topNavWalker(),
                            'container' => false,
                        ),
                    ); ?>
                    </nav>
                    <!-- Search Icom -->    
                    <div class="search-icon">
                        <a href="<? echo get_permalink(5461); ?>">
                            <img src="<? bloginfo('template_url'); ?>/images/search_icon.png" alt="Search"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="super-container bot-menu-holder">
            <div class="container primary-nav-wrapper">
                <div class="sixteen columns alpha omega primary-nav-holder">
                    <nav id="access" aria-label="Main Navigation">
                        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                        <ul class="menu-main-menu">
                            <li>
                                <button class="toggle-mega-menu" aria-expanded="false" aria-controls="admissions-subs" id="admissions-subs-actuator">Admissions<span class="caret-icon" aria-hidden="true"></span></button>
                            </li>
                            <li>
                                <button class="toggle-mega-menu" aria-expanded="false" aria-controls="academics-subs">Academics<span class="caret-icon" aria-hidden="true"></span></button>
                            </li>
                            <li>
                            <button class="toggle-mega-menu" aria-expanded="false" aria-controls="campus-subs">Campus &amp; Community<span class="caret-icon" aria-hidden="true"></span></button>
                            </li>
                            <li>
                                <button class="toggle-mega-menu" aria-expanded="false" aria-controls="arts-subs">Arts &amp; Theatre<span class="caret-icon" aria-hidden="true"></span></button>
                            </li>
                        </ul>
                        <?
                        get_template_part('submenu', 'admissions');
                        get_template_part('submenu', 'academics');
                        //get_template_part('submenu', 'athletics');
                        get_template_part('submenu', 'campus');
                        get_template_part('submenu', 'arts');
                        ?>
                    </nav><!-- access -->
                </div><!-- menu-holder -->
            </div>
        </div>
        <div class="super-container" id="slicknav_holder"></div>
    </div>
</div>
                            
<?

    global $alert_list;
    $alert_list  = get_theme_mod( 'alert_list');
    if ($alert_list) {
        get_template_part('alert');
    }

    // if (is_front_page()) {
    // 	get_template_part('slideshow');
    // }

    if(is_page(166436)){
        get_template_part('slideshow');
    }
?>
