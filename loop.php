<?
	defined('ABSPATH') OR exit;
	/**
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */
?>

<div class="content">
	<div class="two-thirds column alpha">
		<div class="main">
			<? while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
				<article id="post-<? the_ID(); ?>">
					<div class="title">
						<a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>"><? the_title('<h3>', '</h3>'); ?></a>  <!--Post titles-->
					</div>
					<? the_content("Continue reading " . the_title('', '', false)); ?> <!--The Content-->
					<!--The Meta, Author, Date, Categories and Comments-->
					<? if(! is_page()) { ?>
						<div class="meta">
							Date posted: <? echo get_the_date(); ?>
							| Author: <? the_author_posts_link(); ?>
							| <? comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
							<p>Categories: <? the_category(' '); ?></p>
						</div>
					<? } ?>
				</article>
			<? endwhile; ?><!--  End the Loop -->

			<? /* Display navigation to next/previous pages when applicable */ ?>
			<? if (  $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-below">
					<hr>
					<div class="nav-previous"><? next_posts_link(); ?></div>
					<div class="nav-next"><? previous_posts_link(); ?></div>
				</nav><!-- #nav-below -->
			<? endif; ?>

			<? /* Only load comments on single post*/ ?>
			<? if(! is_page() || is_single()) : comments_template( '', true ); endif; ?>

		</div>  <!-- End Main -->
	</div>  <!-- End two-thirds column -->
</div><!-- End Content -->

