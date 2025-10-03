<?
	defined('ABSPATH') OR exit;
	/**
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();
    get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

<div class="super-container interior-page">
	<div class="container">
	    <div class="sixteen columns alpha">
			<div id="primary" class="full-width">
				<div id="content">
	                <div class="two-thirds column alpha">
					<main id="main-content" class="main">

				            <article id="post-0" class="error404">
								<header class="entry-header">
									<h1 class="entry-title">404 - File Not Found</h1>
								</header>

								<div class="entry-content">
								  <p>It seems we can't find what you're looking for. Perhaps searching may help.</p>
								  <?php get_search_form(); ?>
								</div><!-- .entry-content -->

							</article><!-- #post-0 -->

						</div><!-- #main -->
					</main><!-- two-thirds -->
				</div><!-- #content -->
			</div><!-- #primary -->
	    </div>
	</div>
</div>

<?php get_footer(); ?>