<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: FAQs Page
	 * Description: Lists FAQs with accordion feature.
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
							<div class="main">
								<? the_post(); ?>
								<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
									<div class="entry-content">
										<div class="sixteen columns alpha omega faq-feed">
                                            <? the_content(); ?>
											<? get_template_part('faq-feed'); ?>
										</div>
									</div><!-- .entry-content -->
								</article><!-- #post-<? the_ID(); ?> -->
							</div><!-- #main -->
						</div><!-- two-thirds -->
						<? get_sidebar(); ?>
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>

<? get_footer(); ?>