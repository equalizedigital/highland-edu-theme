<?php

/**
 * Support color palette in Gutenberg editor.
 *
 * @return void
 */
function eqd_setup_theme_supported_features() {
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_attr__( 'Blue', 'eqd' ),
				'slug'  => 'blue',
				'color' => '#285598',
			),
			array(
				'name'  => esc_attr__( 'Dark Blue', 'eqd' ),
				'slug'  => 'dark-blue',
				'color' => '#193662',
			),
			array(
				'name'  => esc_attr__( 'Brown', 'eqd' ),
				'slug'  => 'brown',
				'color' => '#603813',
			),
			array(
				'name'  => esc_attr__( 'Orange', 'eqd' ),
				'slug'  => 'orange',
				'color' => '#ff6200',
			),
			array(
				'name'  => esc_attr__( 'Light Orange', 'eqd' ),
				'slug'  => 'light-orange',
				'color' => '#FFDCC7',
			),
			array(
				'name'  => esc_attr__( 'Gray', 'eqd' ),
				'slug'  => 'gray',
				'color' => '#787474',
			),
			array(
				'name'  => esc_attr__( 'Light Gray', 'eqd' ),
				'slug'  => 'light-gray',
				'color' => '#EBEBEB',
			),
			array(
				'name'  => esc_attr__( '8b8989', 'eqd' ),
				'slug'  => 'mid-gray',
				'color' => '#8b8989',
			),
			array(
				'name'  => esc_attr__( 'White', 'eqd' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_attr__( 'Black', 'eqd' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
		)
	);
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-line-height' );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'editor-styles' );
}

add_action( 'after_setup_theme', 'eqd_setup_theme_supported_features' );

add_editor_style( 'stylesheets/style-editor.css' );


/**
 * Enqueue block editor style on frontend.
 *
 * @return void
 */
function eqd_enqueue_block_editor_assets() {
	wp_enqueue_style( 'eqd-block-editor-styles', get_stylesheet_directory_uri() . '/stylesheets/block-editor.css', array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'eqd_enqueue_block_editor_assets' );
