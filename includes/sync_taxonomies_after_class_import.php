<?php
/**
 * Ensure taxonomies are fully assigned and visible immediately after each post is imported by WP All Import.
 *
 * WP All Import sometimes assigns taxonomies in a way that isn't properly registered in WordPress until the post is updated.
 * This function forces a post update after each import, triggering all WordPress hooks and ensuring taxonomy relationships are visible right away.
 */

function edhc_sync_taxonomies_after_class_import( $post_id ) {
	$post = get_post( $post_id );

	// Only do this for 'class' types.
	if ( $post && 'class' === $post->post_type ) {
		// Force-update the post to trigger all WordPress hooks and properly assign taxonomies.
		// This does not change content, but ensures all relationships are registered.
		wp_update_post(
			[
				'ID'           => $post_id,
				'post_content' => $post->post_content,
			]
		);
	}
}
add_action( 'pmxi_saved_post', 'edhc_sync_taxonomies_after_class_import', 2000 );





