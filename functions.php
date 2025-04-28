<?php 
defined('ABSPATH') OR exit;
define('THEME_VERSION', '1.0.3');
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */

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
add_image_size( 'team-member', 300, 300, true );


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
	wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null);
	wp_enqueue_script('detect', get_template_directory_uri().'/includes/js/mobile-detect.js#asyncload', array( 'jquery' ) );
	wp_enqueue_script('jquery');
	wp_enqueue_script('navigation', get_template_directory_uri().'/includes/js/navigation.js', array(), THEME_VERSION, true );
	wp_enqueue_script('customjs', get_template_directory_uri().'/includes/js/custom.js', array('jquery'), THEME_VERSION, true );
	wp_enqueue_style('global', get_template_directory_uri().'/stylesheets/global.min.css', array(), THEME_VERSION, 'all' );

    // Enqueue Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        get_template_directory_uri() . '/includes/swiper/swiper.min.css',
        array(),
        '6.8.4'
    );

    // Enqueue Swiper JS
    wp_enqueue_script(
        'swiper-js',
        get_template_directory_uri() . '/includes/swiper/swiper.min.js',
        array('jquery'),
        '6.8.4',
        true
    );	
}

add_action( 'enqueue_block_assets', 'mstar_block_admin_editor_styles' );
function mstar_block_admin_editor_styles() {
	wp_enqueue_style( 'mstar-block-editor-styles', get_template_directory_uri(). '/stylesheets/editor.css', false, THEME_VERSION, 'all' );
}
//Adds Customizer functinality
function mytheme_customize_register( $wp_customize ){
	require_once( get_stylesheet_directory() . '/includes/customizer.php' );
}
add_action( 'customize_register', 'mytheme_customize_register' );





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
include('includes/block-editor.php');

//include('includes/twitter_loader.php'); 	//-- call within page, not functions!
//include('includes/facebook_feed.php');  	//-- call within page, not functions!
//include('includes/fancy_loader.php');   	//-- call within page, not functions!

/**
 * Helper function to replace the first occurence of a string.
 *
 * @param  mixed $search
 * @param  mixed $replace
 * @param  mixed $subject
 * @return void
 */
function str_replace_first($search, $replace, $subject) {
    $search = '/'.preg_quote($search, '/').'/';
    return preg_replace( $search, $replace, $subject, 1 );
}
/**
 * By default, Gravity Forms isn't accessible. This function adds a fieldset and legend to checkbox fields.
 *
 * @param  mixed $content
 * @param  mixed $field
 * @param  mixed $value
 * @param  mixed $lead_id
 * @param  mixed $form_id
 * @return void
 */
function add_fields_wrapper( $content, $field, $value, $lead_id, $form_id ) {
	if ( 'checkbox' === $field->type ) {
		$content = str_replace_first( '<label', '<legend class="reset-legend"><label', $content );
		$content = str_replace_first( '</label>', '</label></legend>', $content );
		$content = '<fieldset>' . $content . '</fieldset>';
	}
	return $content;
}
//add_filter( 'gform_field_content', 'add_fields_wrapper', 10, 5 );

/**
 * By default, Gravity Forms isn't accessible. This function adds autocomplete attributes to fields.
 *
 * @param  mixed $content
 * @param  mixed $field
 * @param  mixed $value
 * @param  mixed $lead_id
 * @param  mixed $form_id
 * @return void
 */
function acco_add_fields_wrapper( $content, $field, $value, $lead_id, $form_id ) {
	$lookup = array(
		2 => 'name',
		3 => 'tel',
	);
	$regex = '/\<(?:input|select|textarea)\s+[^\>]+?(\s*\/?\>){1}/im';
	if ( preg_match( $regex, $content, $input ) ) {
		$attribute    = $lookup[ $field->id ];
		$autocomplete = sprintf( ' autocomplete="%s"', esc_attr( $attribute ) );
		$element      = str_replace( $input[1], $autocomplete . $input[1], $input[0] );
		$content      = str_replace( $input[0], $element, $content );
	}
	return $content;
}
add_filter( 'gform_field_content_5', 'acco_add_fields_wrapper', 10, 5 );

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
	if ( ! class_exists( 'Tribe__Events__Organizer' ) ) {
		return;
	}
	remove_submenu_page('edit.php?post_type=tribe_events', 'edit.php?post_type=' . Tribe__Events__Organizer::POSTTYPE );
}
// body classes filter
function mstar_body_classes( $classes ) {
	global $post;
	$post_id = $post->ID;
	$hide_h1_visually = get_field('hide_h1_visually', $post_id);
	if($hide_h1_visually) {
		$classes[] = 'hide-h1-visually';
	}
	return $classes;
}
add_filter( 'body_class', 'mstar_body_classes' );


function add_id_to_results_per_page($output, $params) {
	if ( 'results_per_page' == $params['facet']['name']) {
		$output = str_replace('<select', '<select id="fwp_results_per_page"', $output);
	}
	if ( 'instructor_schedule' == $params['facet']['name']) {
		$output = str_replace('<select', '<select id="fwp_instructor_schedule"', $output);
	}
	if ( 'schedule_department' == $params['facet']['name']) {
		$output = str_replace('<select', '<select id="fwp_schedule_department"', $output);
	}
	if ( 'ethnicity_filter' == $params['facet']['name']) {
		$output = str_replace('<select', '<select id="fwp_ethnicity_filter"', $output);
	}
	if ( 'ineterst_filter' == $params['facet']['name']) {
		$output = str_replace('<select', '<select id="fwp_ineterst_filter"', $output);
	}
	if ( 'gpa_filter' == $params['facet']['name']) {
		$output = str_replace('<select', '<select id="fwp_gpa_filter"', $output);
	}
	if ( 'last_name' == $params['facet']['name'] ) {
		$output = str_replace('<input type="text" ', '<input type="text" id="fwp_staff_name"', $output);
	}
	return $output;
}
add_filter('facetwp_facet_html', 'add_id_to_results_per_page', 10, 2);

function convert_days_fullnames( $abbreviations ) {
	$daysMapping = [
		'M' => 'Monday',
		'T' => 'Tuesday',
		'W' => 'Wednesday',
		'R' => 'Thursday',
		'F' => 'Friday',
		'S' => 'Saturday',
		'U' => 'Sunday'
	];
	$fullNames = [];
	for ($i = 0; $i < strlen($abbreviations); $i++) {
		$char = $abbreviations[$i];
		if (isset($daysMapping[$char])) {
			$fullNames[] = $daysMapping[$char];
		}
	}
	return implode(', ', $fullNames);
}

add_filter( 'facetwp_pager_html', 'adjust_pager_accessibility', 10, 2 );
function adjust_pager_accessibility( $output, $params ) {
	$output = str_replace( 'Go to next page', 'Go to next page of results', $output );
	$output = str_replace( 'Go to previous page', 'Go to previous page of results', $output );
	return $output;
}

add_filter( 'gettext', function( $translated_text, $text, $domain ) {
	if ( 'fwp-front' == $domain ) {
	  if ( 'Go to next page' == $text ) {
		$text = 'Go to next page of results';
	  }
	  if ( 'Go to previous page' == $text ) {
		$text = 'Go to previous page of results';
	  }
	}
	return $text;
}, 10, 3 );

add_filter( 'render_block', 'replace_figure_with_div_in_image_block', 10, 2 );

function replace_figure_with_div_in_image_block( $block_content, $block ) {
    // Check if it's an image block
    if ( 'core/image' !== $block['blockName'] ) {
        return $block_content;
    }

    // Check if the block's innerHTML contains a <figcaption> element
    if ( strpos( $block['innerHTML'], '<figcaption' ) === false ) {
        // Replace opening <figure> tag with <div>
        $block_content = preg_replace('/<figure([^>]*)>/', '<div$1>', $block_content);

        // Replace closing </figure> tag with </div>
        $block_content = str_replace('</figure>', '</div>', $block_content);
		$block_content = '<div class="wp-block-image">' . $block_content . '</div>';
    }

    return $block_content;
}

// Remove the admin bar for non-logged-in users.
add_filter( 'show_admin_bar', function ( $show ) {
	return is_user_logged_in() ? $show : false;
} );


/**
 * Set Public Post Preview the nonce life to 10 days.
 *
 * @return int
 */
function csm_nonce_life() {
    return 10 * DAY_IN_SECONDS;
}
add_filter( 'ppp_nonce_life', 'csm_nonce_life' );
