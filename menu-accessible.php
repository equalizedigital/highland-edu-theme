<style>
@media only screen and (min-width: 1025px){
    #menu-main-menu {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: flex-start;
        list-style: none;
    }
    #menu-main-menu li{
        position: static;
    }
    #menu-main-menu li a {
        font-family: 'Overpass', sans-serif;
        position: relative;
        font-size: 16px;
        display: inline-block;
        padding: 24px 8px 24px 24px;
        text-decoration: none;
        margin: 0;
        font-weight: 700;
        text-transform: uppercase;
    }
    .sub-menu-toggle {
        color: #193662;
        display: inline-block;
        vertical-align: middle;
        width: auto;
        height: auto;
        text-align: center;
        padding: 0;
        border: none;
        background: transparent;
        transform: rotate(0deg);
        transition: all 250ms ease;
        cursor: pointer;
            font-size: 20px;
    font-weight: bold;
    }
	.sub-menu-toggle.active {
        transform: rotate(405deg);
        transition: all 135ms ease;
    }

    #menu-main-menu li ul.sub-menu{
        display: none;
    }
    #menu-main-menu li ul.sub-menu.expanded{
        padding: 20px 100px;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-start;
        align-items: flex-start;
        list-style: none;
        width: 100vw;
        margin: 0;
        position: absolute;
        left: 0;
        top: 60px;
        background: #285598;
        z-index: 10001;
    }
    #menu-main-menu li ul.sub-menu.expanded li{
    text-align: left;
    flex-basis: 33%;
    }
    #menu-main-menu li ul.sub-menu.expanded li a{
    padding:5px;
    text-align: left;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    color: #fff;
    }
    #menu-main-menu li ul.sub-menu.expanded li button{
    display: none;
    }
    #menu-main-menu li ul.sub-menu.expanded li ul.sub-menu{
    display: block;
    padding: 0;
    list-style: none;
    text-align: left;
    }
    #menu-main-menu li ul.sub-menu.expanded li ul.sub-menu{
    margin: 0;
    }
    #menu-main-menu li ul.sub-menu.expanded li ul.sub-menu li{
    margin-left: 0;
    }
    #menu-main-menu li ul.sub-menu.expanded li ul.sub-menu li a{
    padding:5px;
    text-align: left;
    font-size: 14px;
    font-weight: normal;
    text-transform: none;
    color: #fff;
    }
}
</style>
<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<a id="hide_me" href="#content">Skip to Content</a>
<div role="banner">
    <div class="logo">
        <a href="<? bloginfo('url'); ?>" tabindex="0" title="Link to the homepage.">
            <img src="<? bloginfo('template_url'); ?>/images/logo.jpg" alt="Highland College Logo."/>
        </a>
    </div>

    <div class="super-container menu-holder" role="navigation">
        <div class="super-container top-menu-holder">
            <div class="container">
                <div class="sixteen columns top-nav-holder" id="top_nav">
                    <div class="search-icon">
                        <a href="<? echo get_permalink(5461); ?>">
                            <img src="<? bloginfo('template_url'); ?>/images/search_icon.png" alt="Search"/>
                        </a>
                    </div>
                    <!--  the Menu -->
                    <? wp_nav_menu(array('theme_location' => 'topnav')); ?>
                </div>
            </div>
        </div>

        <div class="super-container bot-menu-holder">
            <div class="container primary-nav-wrapper">
                <div class="sixteen columns alpha omega primary-nav-holder">
                    <div id="access">
						<!-- Start Accessible Nav Walker -->
                        <nav aria-label="Main Navigation">
                            <?php
                              $args = array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'menu',
                                'echo' => true,
                                'fallback_cb' => false,
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 0,
                                'walker' => new Menu_With_Button_Walker
                              );
                              wp_nav_menu( $args );
                            ?>
                          </nav>

                          <?php
                          class Menu_With_Button_Walker extends Walker_Nav_Menu {
                            function start_lvl( &$output, $depth = 0, $args = array() ) {
                              $indent = str_repeat("\t", $depth);
                              $output .= "\n$indent<ul class='sub-menu'>\n";
                            }
                            function end_lvl( &$output, $depth = 0, $args = array() ) {
                              $indent = str_repeat("\t", $depth);
                              $output .= "$indent</ul>\n";
                            }
                            function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                              $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                              $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                              $classes[] = 'menu-item-' . $item->ID;
                              $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
                              $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
                              $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
                              $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
                              $output .= $indent . '<li' . $id . $class_names .'>';
                              $atts = array();
                              $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
                              $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
                              $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
                              $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
                              $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
                              $attributes = '';
                              foreach ( $atts as $attr => $value ) {
                                if ( ! empty( $value ) ) {
                                  $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                                  $attributes .= ' ' . $attr . '="' . $value . '"';
                                }
                              }
                              $item_output = $args->before;
                              $item_output .= '<a'. $attributes .'>';
                              $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
                          	  $item_output .= '</a>';
                              // Add a button for menu items with children
                              if (in_array('menu-item-has-children',  
                        $classes)) {
                            $item_output .= '<button class="sub-menu-toggle" aria-label="Toggle sub-menu" aria-expanded="false" aria-haspopup="true"><span class="screen-reader-text">Toggle sub-menu</span><span>+</span></button>';
                          }
                          $item_output .= $args->after;
                          $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );  
                        }
                        function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {
                        if (isset($children_elements[$element->ID])) {
                        $element->classes[] = 'menu-item-has-children';
                        }
                        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
                        }
                        }
                        ?>
                        <!-- End Accessible Nav Walker -->
                    </div><!-- access -->
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

    if (is_front_page()) {
    	get_template_part('slideshow');
    }

    if(is_page(166436)){
        get_template_part('slideshow');
    }
?>
<div class="social-butterfly sb-inner">
    <?php get_template_part( 'social','butterfly'); ?>
</div>
<script>
var toggleButtons = document.querySelectorAll('button.sub-menu-toggle');
for (var i = 0; i < toggleButtons.length; i++) {
    toggleButtons[i].addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        this.classList.toggle('active');
        this.parentNode.querySelector('ul.sub-menu').classList.toggle('expanded');
        var isExpanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', !isExpanded);
    });
}
</script>