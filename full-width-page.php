<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Full-width, no sidebar
	 * Description: A full-width template with no sidebar
	 *
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();
    get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
	$hide_h1_visually = get_field('hide_h1_visually');
?>

<div class="super-container title-holder <?php echo $hide_h1_visually ? 'sr-only' : ''; ?>" >
        <div class="container">
            <div class="sixteen columns alpha omega primary-nav-holder">
				<h1><? the_title(); ?></h1>
            </div><!-- menu-holder -->
        </div>
    </div>

    <div class="super-container interior-page">
	<div class="container">
	    <div class="sixteen columns alpha">
			<div id="primary" class="full-width">
				<main id="main-content">
					<? the_post(); ?>
					<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
						<div class="entry-content">
							<? the_content(); ?>
							<? edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-<? the_ID(); ?> -->
				</main><!-- #content -->
			</div><!-- #primary -->
	    </div>
	</div>
</div>
                
<? get_footer(); ?>