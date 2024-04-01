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
		<div class="two-thirds column alpha">
			<section id="primary" role="region">
				<main id="main-content">
					<? the_post(); ?>
					<header class="page-header">
						<h2 class="page-title author"><?php printf( __( 'Author Archives: <span class="vcard">%s</span>', 'WP-Skeleton' ), "<a class='author' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h2>
					</header>
					<? rewind_posts(); ?>
					<? get_template_part( 'loop', 'author' ); ?>
				</main><!-- #content -->
			</section><!-- #primary -->
		</div>
		<? get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
	</div>
</div>
<?php get_footer(); ?>