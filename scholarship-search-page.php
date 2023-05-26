<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Scholarship Search Page
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

	<div class="super-container interior-page">
		<div class="container">
			<div class="sixteen columns alpha omega">
				<div id="primary" class="full-width">
					<div id="content">
						<div class="main">
							<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
								<header class="entry-header">
									<h1 class="entry-title"><? the_title(); ?></h1>
								</header><!-- .entry-header -->
								<div class="entry-content scholarship-directory">
									<div id="srch-step-one" class="mstarAjax">
										<? /* these hidden inputs are used to set default values for the ajax args */ ?>
										<input type="hidden" value="scholarship" id="post-type-holder" target="srch-step-two">
										<input type="hidden" id="tot_posts" value="<?php echo wp_count_posts('scholarship')->publish; ?>" />
										<input type="hidden" value="100" id="posts-per-page-holder" />
										<input type="hidden" value="ASC" id="order-holder" />
										<input type="hidden" value="title" id="order-by-holder" />
										<input type="hidden" value="<? the_permalink(); ?>" id="permalink">
										<input type="hidden" value="a-to-z" id="search-by-holder" />
									</div>
									<div name="search_options" id="srch-step-two" class="mstarAjax scholarship-options">
										<div class="search-options-overlay"><h2>Search Options not available when using type to search</h2></div>
										<form id="scholarship-finder">
											<div class="find-col tt-search reset-holder scholarship-search">
												<label for="loc">Academic Interest</label>
												<select class="the-selectors" name="academic interest" id="loc" tax="academic_interest"></select>
											</div>
											<!--<div class="find-col toggler">
												<label for="gender">Gender</label>
												<select class="the-selectors" name="gender" id="gender" tax="scholarship_gender"></select>
											</div>-->
											<div class="find-col toggler">
												<label for="enrollment">Enrollment Status</label>
												<select class="the-selectors" name="enrollment status" id="enrollment" tax="enrollment_status"></select>
											</div>
											<div class="find-col toggler">
												<label for="ethnicity">Ethnicity</label>
												<select class="the-selectors" name="ethnicity" id="ethnicity" tax="scholarship_ethnicity"></select>
											</div>
											<div class="find-col toggler">
												<label for="gpa">GPA</label>
												<select class="the-selectors" name="gpa" id="gpa" tax="scholarship_gpa"></select>
											</div>
											<div class="find-col toggler">
												<label for="residence">Residence</label>
												<select class="the-selectors" name="residence" id="residence" tax="scholarship_residence"></select>
											</div>
											<div class="clear"></div>
										</form>
									</div>
									<hr>
                                        <div id="ajax-pagination"></div>
										<div class="clear"></div>
										<div class="ajax-loading">Loading<br /><img src="<?php bloginfo('template_url');?>/images/loady.gif" /></div>
										<div id="display-results" class="mstarAjax"></div>
									</div>
									<div id="results-template" class="mstarAjax">
                                        <li class="scholarship-entry"><div><h2><a type="permalink"><span type="function" key="the_title"></span></a></h2></div><div><span type="tax" slug="academic_interest"></span></div><div>&nbsp;</div><div><a type="permalink">View Details</a></div></li>
									</div>
                                <div id="ajax-pagination-bot"></div>
								</div><!-- .entry-content -->
							</article><!-- #post-<? the_ID(); ?> -->
						</div><!-- #main -->
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>

<? get_footer(); ?>