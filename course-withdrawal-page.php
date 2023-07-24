<?

$entry_id = $_GET['eId'];
$entry_hash = $_GET['eHash'];

if(!$entry_id || !$entry_hash){
	wp_redirect(get_permalink(813));
	exit;
}

$form_id = 17;
$admn_eml = get_option( 'admin_email' );

$form = RGFormsModel::get_form_meta($form_id);
$entry = RGFormsModel::get_lead($entry_id);
$lead = GFAPI::get_entry(esc_attr($entry_id));

if($entry_hash != $entry[9]){
	wp_redirect(get_permalink(813));
	exit;
}

$entry[10] = "Confirmed";
GFAPI::update_entry($entry, $entry_id);

$notifications = GFCommon::get_notifications_to_send( 'form_submission', $form, $entry );
$note = $notifications[0];
//var_viewer($note);

$notifications_to_send = array();
$notifications_to_send[] = $note['id'];

GFCommon::send_notifications( $notifications_to_send, $form, $entry );

defined('ABSPATH') OR exit;
/**
 * Template Name: Course Withdrawal Verification Page
 * Description: Accepts hashtag from url to verify a course withdrawal submission via email.
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header();
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

	<div class="super-container interior-page">
		<div class="container">
			<div class="sixteen columns alpha">
				<div id="primary" class="full-width">
					<div id="content">
						<div class="two-thirds column alpha">
							<main class="main" id="main-content">
								<? the_post(); ?>
								<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
									<div class="entry-content">
										<div class="sixteen columns alpha omega faq-feed">
											<?
												the_content();
											?>
										</div>
									</div><!-- .entry-content -->
								</article><!-- #post-<? the_ID(); ?> -->
							</main><!-- #main -->
						</div><!-- two-thirds -->
						<? get_sidebar(); ?>
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>

<? get_footer(); ?>