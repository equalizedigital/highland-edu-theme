<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Portal Logout Page
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

	session_unset();     // unset $_SESSION variable for the run-time
	session_destroy();   // destroy session data in storage

	$url = "https://login.highland.edu/AGLogout";
	wp_redirect( $url);
	die();
?>