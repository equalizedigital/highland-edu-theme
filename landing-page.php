<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Landing Page
	 * Description: A full-width template with no header or sidebar
	 *
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();
    get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
    <div class="super-container interior-page">
		<div id="primary" class="full-width no-padding">
			<div id="content" class="no-padding">
				<? the_post(); ?>
				<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
					<div class="entry-content no-padding">
						<? the_content(); ?>
						<? edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<? the_ID(); ?> -->
			</div><!-- #content -->
		</div><!-- #primary -->
	</div>
<? get_footer(); ?>