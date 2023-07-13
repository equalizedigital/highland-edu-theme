<?php
/**
 * Advanced Custom Fields
 *
 * @package     Equalize Digital Base Functionality
 * @package     Equalize Digital
 * @since       1.0.0
 * @license     GPL-2.0+
 */

class EQD_ACF_Customizations {

	public function __construct() {

		// Only allow fields to be edited on development
		//add_action( 'acf/init', array( $this, 'show_admin' ) );

		// Register options page
		add_action( 'init', array( $this, 'register_options_page' ) );
		// register blocks
		add_action( 'acf/init', array( $this, 'register_blocks' ) );

	}

	/**
	 * Register Options Page
	 *
	 */
	public function register_options_page() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page( array(
				'title'      => __( 'Site Options', 'core-functionality' ),
				'capability' => 'manage_options',
				'parent_slug' => 'themes.php'
			) );
		}
	}

	/**
	 * Only allow fields to be edited on local or development
	 * 
	 * https://www.advancedcustomfields.com/resources/how-to-hide-acf-menu-from-clients/
	 * https://developer.wordpress.org/reference/functions/wp_get_environment_type/
	 * https://localwp.com/help-docs/advanced/using-wp_get_environment_type-to-code-for-different-environments/
	 * 
	 */
	public function show_admin() {
		if ( wp_get_environment_type() != 'production' ){
			if(isset($_GET['page']) && $_GET['page'] == 'acf-settings-updates'){
			}else{
				add_filter( 'acf/settings/show_admin', '__return_false' );
			}
		}
		if ( isset($_GET['post_type']) && ( $_GET['post_type'] == 'acf-field-group') ) {
			if ( ! isset($_GET['page'] ) ) {
				wp_redirect(admin_url());
			}
		}
	}
	public function register_blocks() {
		if ( function_exists( 'acf_register_block_type' ) ) {
			acf_register_block_type( array(
				'name'            => 'eqd-team-block',
				'title'           => __( 'Team members', 'core-functionality' ),
				'description'     => __( 'A custom block for displaying team members', 'core-functionality' ),
				'render_template' => 'template-parts/blocks/team-block.php',
				'category'        => 'layout',
				'icon'            => 'admin-users',
				'keywords'        => array( 'team', 'teams', 'admin' ),
			) );
		}
	}
}
new EQD_ACF_Customizations();
