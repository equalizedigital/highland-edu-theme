<?
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
						<main class="main" id="main-content">
							<? if ( have_posts() ) : ?>
								<h2 class="page-title"><? printf( __( 'Search Results for: %s', 'mb' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
								<? get_search_form(); ?>
								<? get_template_part( 'loop', 'search' ); ?>
							<? else : ?>
								<div id="post-0" class="post no-results not-found">
									<h2 class="entry-title"><? _e( 'Nothing Found', 'mb' ); ?></h2>
									<p><? _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
									<? get_search_form(); ?>
								</div><!-- #post-0 -->
							<? endif; ?>
						</main><!-- #main -->
					</div><!-- two-thirds -->
				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
</div>
<? get_footer(); ?>