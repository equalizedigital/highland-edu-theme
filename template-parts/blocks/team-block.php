<?php
/*
* Block Name: Team Block
* Description: A custom block for displaying team members
* Category: layout
*/

$block_id = 'team-block-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// member repeater contains member_image, member_name, member_position, member_email.
// Wrap them in list items.
if ( have_rows( 'member' ) ) {
	echo '<ul class="team-block">';
	while ( have_rows( 'member' ) ) {
		the_row();
		$member_image_id = get_sub_field( 'member_image' );
		$member_image    = wp_get_attachment_image_url( $member_image_id, 'team-member' );
		$member_name     = get_sub_field( 'member_name' );
		$member_position = get_sub_field( 'member_position' );
		$member_email    = get_sub_field( 'member_email' );
		$image_alt       = get_post_meta( $member_image_id, '_wp_attachment_image_alt', true );
		echo '<li class="team-block__member">';
		if ( ! empty( $member_image ) ) {
			echo '<img class="team-block__member-image" src="' . esc_url( $member_image ) . '" alt="' . esc_html( $image_alt ) . '">';
		}
		if ( ! empty( $member_name ) ) {
			echo '<h2 class="team-block__member-name">' . esc_html( $member_name ) . '</h2>';
		}
		if ( ! empty( $member_position ) ) {
			echo '<p class="team-block__member-position">' . esc_html( $member_position ) . '</p>';
		}
		if ( ! empty( $member_email ) ) {
			echo '<a class="team-block__member-email" href="mailto:' . esc_html( sanitize_email( $member_email ) ) . '">' . __( 'Contact', 'eqd' ) . '</a>';
		}
		echo '</li>';
	}
	echo '</ul>';
}

