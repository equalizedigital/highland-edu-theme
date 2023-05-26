<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Student Portal Access Page
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();


	/* This was built with full knowledge that it was not secure in any
	 * form. We informed the client that their old login system was not
	 * working and they instructed us to mimic the current system.
	 *
	 * The login used on Highlands internal servers are not set to pass
	 * any sort of $_POST data to us that we can use to verify any
	 * credentials. If anyone opens this page on their own this will
	 * automatically bypass the login system for pages on this website.
	 */

	$_SESSION['Login_Status'] = "student";
	$_SESSION['Last_Active'] = time(); // update last activity time stamp

	$url = get_permalink(813);
	wp_redirect( $url);
	die();
?>