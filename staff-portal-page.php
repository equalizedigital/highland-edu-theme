<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Staff Portal Page
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();
	if (!isset($_SESSION['Login_Status'])){
		$url = "https://login.highland.edu/";
		wp_redirect( $url);
		die();
	}
	if ($_SESSION['Login_Status'] == "student"){
		$url = get_permalink(813);
		wp_redirect( $url);
		die();
	}
	global $client_type;
	$client_type = $_SESSION['Login_Status'];

	get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

	<div class="super-container title-holder">
		<div class="container">
			<div class="sixteen columns alpha omega primary-nav-holder">
				<header>
					<h1><? the_title(); ?></h1>
				</header><!-- access -->
			</div><!-- menu-holder -->
		</div>
	</div>

	<div class="super-container portal-menu-holder">
		<div class="container">
			<div class="sixteen columns alpha omega primary-nav-holder">
				<div id="more_access">
					<? wp_nav_menu(array('theme_location' => 'resource-nav')); ?>
				</div><!-- access -->
			</div><!-- menu-holder -->
		</div>
	</div>

	<div class="super-container interior-page">
		<div class="container">
			<main id="main-content">
				<? get_template_part('sidebar'); ?>
				<div class="two-thirds column alpha omega" id="portal_page">
					<div class="sixteen columns alpha omega">
						<div class="eight columns alpha omega portal-hr-feed">
							<? get_template_part('portal-newsfeed'); ?>
						</div>
						<div class="eight columns alpha omega portal-news-feed cougar-corner">
							<? get_template_part('portal-hr-newsletter-feed'); ?>
						</div>
					</div>
					<div class="sixteen columns alpha omega">
						<div class="eight columns alpha omega portal-news-feed">
							<? get_template_part('portal-hr-feed'); ?>
						</div>
						<div class="eight columns alpha omega staff-portal-events">
							<H3>campus events</H3>
							<? get_template_part('staff-events-feed'); ?>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>

<? get_footer(); ?>