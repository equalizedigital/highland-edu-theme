<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Full-width, no sidebar or header
	 * Description: A full-width template with no sidebar or header
	 *
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();
    get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
	$hide_h1_visually = get_field('hide_h1_visually');
?>
<main id="main-content">

    <div class="super-container interior-page">
		<div class="container">
			<div class="sixteen columns alpha">
				<div id="primary" class="full-width">
					<? the_post(); ?>
					<div class="entry-content">
						<? the_content(); ?>
						<? edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</main>
                
<? get_footer(); ?>