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
	                    <div class="main content">
				            <? get_template_part( 'loop', 'archive' );?>
						</div><!-- #main -->
	                </div><!-- two-thirds -->
	                <? get_sidebar(); ?>
				</div><!-- #content -->
			</div><!-- #primary -->
	    </div>
	</div>
</div>
   
<? get_footer(); ?>