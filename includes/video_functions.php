<?php

// video link shortcode [vid id=""]
add_shortcode('vid', 'mstar_video_link');

function mstar_video_link($atts) {
	extract( shortcode_atts( array(
		'id' => '433',
		),
		$atts 
		)
	);
	$slug 		= get_post_meta($id, '_cmb_video_url', true);
	$img_id		= get_post_meta($id, '_cmb_video_feature_id', true);
	$img_id		= get_post_thumbnail_id($id);
	$img_src	= wp_get_attachment_image_src( $img_id, 'video-thumb');
	$single 	= get_permalink($id);
	$title 		= get_the_title($id);
	
	$return  = '<div class="video-thumb-holder">';
	$return .= '<a href="'.$single.'" class="video-thumb fancybox.ajax fancybox">';
	$return .= '<img src="'.get_template_directory_uri().'/images/vid-overlay.png">';	
	$return .= '</a>';
	$return .= '<img src="'.$img_src[0].'" title="'.$title.'" alt="'.$title.'" />';
	$return .= '</div>';
	return $return;
}



/***** 
 *
 * Ads vid button for tinymce to ad shortcode to wysiwyg editor
 *
 ****/
 
add_action('init', 'mstar_vid_button');

function mstar_vid_button() {
	if(!current_user_can('edit_posts') && !current_user_can('edit_pages')){
		return;
	}
	if(get_user_option('rich_editing') == 'true') {
		add_filter('mce_external_plugins', 'mstar_add_plugin');
		add_filter('mce_buttons', 'mstar_register_button');
	}
}

function mstar_register_button($buttons) {
	array_push($buttons, "|", "vid");
	return $buttons;
}

function mstar_add_plugin($plugin_array) {
	$plugin_array['vid'] = get_bloginfo('template_url') . '/includes/js/vid.js';
	return $plugin_array;
}

/*****
 *
 * Adds custom column for ID column and Gallery Name to add to shortcode
 *
 ****/
add_filter('manage_edit-video_columns', 'mstar_edit_video_columns' );
function mstar_edit_video_columns( $columns ) {
	$columns['id'] = __('ID');
	$columns['gallery-number'] = __('Gallery Name');
	return $columns;
}
add_action('manage_video_posts_custom_column', 'mstar_manage_video_columns', 10, 2 );
function mstar_manage_video_columns ( $column_name, $id ) {
	global $wpdb;
	if($column_name == 'id'){
		echo $id;
	}							
	$gallery_number = get_post_meta($id, '_cmb_gallery_name', true);
	if($column_name == 'gallery-number'){
		echo $gallery_number;
	}
}


/***** 
 *
 * The shortcaode [vidsrunner gallery="?"]
 *
 ****/
function my_vids_shortcode( $attr ) {
    ob_start();
    global $gallery;
    extract( shortcode_atts( array(
		'gallery' => 'gallery',
	), $attr, 'vidsrunner' ) );
    get_template_part( 'vidsrunner' );
    return ob_get_clean();
}
add_shortcode( 'vidsrunner', 'my_vids_shortcode' );
