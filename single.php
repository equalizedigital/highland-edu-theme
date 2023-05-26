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
						<div class="main">
							<? the_post(); ?>
							<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
								<header class="entry-header">
									<h1 class="entry-title"><? the_title(); ?></h1>
								</header><!-- .entry-header -->
								<div class="entry-content">
									<?
										if(has_post_thumbnail()){
											the_post_thumbnail('featured-image');
										}
									?>
									<div class="blog-entry-meta">
										<small><? the_time('F jS, Y'); ?></small>
									</div>
									<? the_content(); ?>
									<? edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
									<? comments_template(); ?>
								</div><!-- .entry-content -->
							</article><!-- #post-<? the_ID(); ?> -->
						</div><!-- #main -->
					</div><!-- two-thirds -->
					<? get_sidebar('page'); ?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
</div>

<? get_footer(); ?>




