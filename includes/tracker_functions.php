<?php
// tracking code, call this function once per page/post
function mstar_post_views_count($post_ID) {
	if(is_user_logged_in() || is_archive()) {
		return;
	}
	$count_key = 'post_views_count'; 
	$count = get_post_meta($post_ID, $count_key, true);
	
	if($count == ''){
		$count = 0;
		delete_post_meta($post_ID, $count_key);		
		add_post_meta($post_ID, $count_key, '0');		
		
	} else {
		$count++; 
		update_post_meta($post_ID, $count_key, $count);
	}
	return $count;
}

// view without adding
function mstar_get_post_views($post_ID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($post_ID, $count_key, true);
	
	return $count;
}
	
// name a new column	
function mstar_post_column_views($new_column) {
	$new_column['post_views_count'] = __('Views');
	return $new_column;
}
add_filter('manage_posts_columns', 'mstar_post_column_views');

// add it to list and spit out view count
function mstar_custom_column_views($column_name, $id) {
	if($column_name == 'post_views_count') {
		echo mstar_get_post_views(get_the_ID());
	}
}
add_action('manage_posts_custom_column', 'mstar_custom_column_views', 10, 2);

