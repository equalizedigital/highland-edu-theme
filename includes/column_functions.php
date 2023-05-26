<?php

// Register the column
function physician_column_register( $columns ) {
	$columns['_cmb_lname'] = __( 'Last Name', 'my-plugin' );
 
	return $columns;
}
add_filter( 'manage_edit-physician_columns', 'physician_column_register' );

// Display the column content
function physician_column_display( $column_name, $post_id ) {
	if ( '_cmb_lname' != $column_name )
		return;
 
	$lname = get_post_meta($post_id, '_cmb_lname', true);
	if ( !$lname )
		$lname = '<em>' . __( 'undefined', 'my-plugin' ) . '</em>';
 
	echo $lname;
}
add_action( 'manage_physician_posts_custom_column', 'physician_column_display', 10, 2 );

// Register the column as sortable
function physician_column_register_sortable( $columns ) {
	$columns['_cmb_lname'] = '_cmb_lname';
 
	return $columns;
}
add_filter( 'manage_edit-physician_sortable_columns', 'physician_column_register_sortable' );

function physician_column_orderby( $vars ) {
	if ( isset( $vars['orderby'] ) && '_cmb_lname' == $vars['orderby'] ) {
		$vars = array_merge( $vars, array(
			'meta_key' => '_cmb_lname',
			'orderby' => 'meta_value'
		) );
	}
 
	return $vars;
}
add_filter( 'request', 'physician_column_orderby' );