<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Athletics Page
 * Description: Adds Google Maps IFrame Above Content Area.
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */


get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

	<div class="super-container title-holder">
		<div class="container">
			<div class="sixteen columns alpha omega primary-nav-holder">
				<header>
					<h1><? the_title(); ?></h1>
				</header><!-- access -->
			</div><!-- menu-holder -->
		</div>
	</div>

	<div class="super-container interior-page">
		<div class="container">
			<div class="sixteen columns alpha">
				<div id="primary" class="full-width">
					<div id="content">
						<div class="two-thirds column alpha">
							<div class="main">
								<? the_post(); ?>
								<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
									<div class="entry-content">
										<div class="sixteen columns alpha omega athletics">
											<div class="iframe-holder">
												<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=2998+West+Pearl+City+Road,+Freeport,+IL&amp;aq=0&amp;oq=2998+West+Pearl+City+Road,+Freeport,+IL&amp;sll=42.278716,-89.706909&amp;sspn=0.082175,0.142307&amp;g=West+Pearl+City+Road,+Freeport,+IL&amp;ie=UTF8&amp;hq=&amp;hnear=2998+W+Pearl+City+Rd,+Freeport,+Illinois+61032&amp;t=m&amp;ll=42.311085,-89.649811&amp;spn=0.082005,0.227623&amp;z=12&amp;iwloc=A&amp;output=embed"></iframe>
											</div>
											<? the_content(); ?>
										</div>
									</div><!-- .entry-content -->
								</article><!-- #post-<? the_ID(); ?> -->
							</div><!-- #main -->
						</div><!-- two-thirds -->
						<? get_sidebar(); ?>
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>

<? get_footer(); ?>