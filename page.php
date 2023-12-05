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
<main id="main-content">
	<div class="super-container title-holder">
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
                    <div id="content">
                        <div class="two-thirds column alpha">
                            <main class="main" id="main-content">
                                <? the_post(); ?>
                                <div class="entry-content">
                                    <? the_content(); ?>
                                    <? edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
                                </div><!-- .entry-content -->
                            </main><!-- #main -->
                        </div><!-- two-thirds -->
                        <? get_sidebar(); ?>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>
</main>

<? get_footer(); ?>