<?
	/**
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
<header class="super-container title-holder">
	<div class="container">
		<div class="sixteen columns alpha omega primary-nav-holder">
			<h1>
				<? printf( __( 'Search Results for: %s', 'mb' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
		</div><!-- menu-holder -->
	</div>
</header>
<main id="main-content" role="main">
	<div class="super-container interior-page">
		<div class="container">
			<div class="sixteen columns alpha">
				<div id="primary" class="full-width">
					<div id="content">
						<div class="two-thirds column alpha">
							<div class="main">
								<? if ( have_posts() ) : ?>
									<h2 class="sr-only">Search Form</h2>
									<? get_search_form(); ?>
									<h2 class="sr-only">Results</h2>
									<? get_template_part( 'loop', 'search' ); ?>
								<? else : ?>
									<div id="post-0" class="post no-results not-found">
										<h2 class="entry-title"><? _e( 'Nothing Found', 'mb' ); ?></h2>
										<p><? _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
										<? get_search_form(); ?>
									</div><!-- #post-0 -->
								<? endif; ?>
							</div><!-- #main -->
						</div><!-- two-thirds -->
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</main>
<? get_footer(); ?>