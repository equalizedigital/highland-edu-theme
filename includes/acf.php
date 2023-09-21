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
		// Save and sync fields in functionality plugin
		add_filter( 'acf/settings/save_json', array( $this, 'get_local_json_path' ) );
		add_filter( 'acf/settings/load_json', array( $this, 'add_local_json_path' ) );
		// Register options page
		add_action('acf/init', array( $this, 'register_blocks' ) );

	}
    /**
	 * Define where the local JSON is saved
	 *
	 * @return string
	 */
	public function get_local_json_path() {
		return get_template_directory() . '/acf-json';
	}

	/**
	 * Add our path for the local JSON
	 *
	 * @param array $paths
	 *
	 * @return array
	 */
	public function add_local_json_path( $paths ) {
		$paths[] = get_template_directory() . '/acf-json';

		return $paths;
	}

	/**
	 * Automatically sync any JSON field configuration.
	 */
	public function sync_fields_with_json() {
		if ( defined( 'DOING_AJAX' ) || defined( 'DOING_CRON' ) ) {
			return;
		}

		if ( ! function_exists( 'acf_get_field_groups' ) ) {
			return;
		}

		$version = get_option( 'eqd_acf_json_version' );
		if( defined( 'THEME_VERSION' ) && version_compare( THEME_VERSION, $version ) ) {

			update_option( 'eqd_acf_json_version', THEME_VERSION );

			$groups = acf_get_field_groups();

			if ( empty( $groups ) ) {
				return;
			}

			$sync = array();

			foreach ( $groups as $group ) {
				$local    = acf_mayeqd_get( $group, 'local', false );
				$modified = acf_mayeqd_get( $group, 'modified', 0 );
				$private  = acf_mayeqd_get( $group, 'private', false );

				if ( $local !== 'json' || $private ) {
					// ignore DB / PHP / private field groups
					continue;
				}

				if ( ! $group['ID'] ) {
					$sync[ $group['key'] ] = $group;
				} elseif ( $modified && $modified > get_post_modified_time( 'U', true, $group['ID'], true ) ) {
					$sync[ $group['key'] ] = $group;
				}
			}

			if ( empty( $sync ) ) {
				return;
			}

			foreach ( $sync as $key => $v ) {
				if ( acf_have_local_fields( $key ) ) {
					$sync[ $key ]['fields'] = acf_get_local_fields( $key );
				}

				acf_import_field_group( $sync[ $key ] );
			}
		}
	}
		/**
	 * Register Blocks
	 * @see https://www.billerickson.net/building-gutenberg-block-acf/#register-block
	 *
	 * Categories: common, formatting, layout, widgets, embed
	 * Dashicons: https://developer.wordpress.org/resource/dashicons/
	 * ACF Settings: https://www.advancedcustomfields.com/resources/acf_register_block/
	 */
	public function register_blocks() {

		if ( ! function_exists( 'acf_register_block' ) ) {
			return;
		}
		acf_register_block( array(
			'name'            => 'slider',
			'title'           => __( 'Accessible Slider' ),
			'description'     => __( 'A custom slider block.' ),
			'render_template' => '/template-parts/blocks/slider/slider.php',
			'enqueue_assets'  => function() {
				wp_enqueue_style( 'swiper', get_template_directory_uri() . '/includes/swiper/swiper.min.css', array(), '10.2.0' );
				wp_enqueue_script( 'swiper', get_template_directory_uri() . '/includes/swiper/swiper.min.js', array(), '10.2.0', true );
				wp_enqueue_script( 'slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.js', array( 'swiper' ), '1.0.0', true );
				wp_enqueue_style( 'slider', get_template_directory_uri() . '/template-parts/blocks/slider/slider.css', array(), '1.0.0' );
			},
			'category'        => 'common',
			'icon'            => 'images-alt2',
			'keywords'        => array( 'Slider', 'Accessible', 'Carousel' ),
			'mode'            => 'edit',
			'align'           => 'full',
			'supports'        => array(
				'align' => array( 'full', 'wide' ),
			),
		) );
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
}
new EQD_ACF_Customizations();
