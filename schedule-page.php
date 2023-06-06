<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Schedule Page
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
								<div class="entry-content schedule-directory">
									<div id="srch-step-one" class="mstarAjax">
										<? /* these hidden inputs are used to set default values for the ajax args */ ?>
										<input type="hidden" value="class" id="post-type-holder" target="srch-step-two">
										<input type="hidden" id="tot_posts" value="<?php echo wp_count_posts('class')->publish; ?>" />
										<input type="hidden" value="-1" id="posts-per-page-holder" />
										<input type="hidden" value="ASC" id="order-holder" />
										<input type="hidden" value="title" id="order-by-holder" />
										<input type="hidden" value="<? the_permalink(); ?>" id="permalink">
										<input type="hidden" value="a-to-z" id="search-by-holder" />
									</div>
									<div name="search_options" id="srch-step-two" class="mstarAjax schedule-options">
										<form id="schedule-finder">
											<div class="find-col tt-search reset-holder schedule-search">
												<label for="location">Location</label>
												<select class="the-selectors" name="location" id="loc" tax="location"></select>
											</div>
											<div class="find-col toggler">
												<label for="location">Subject</label>
												<select class="the-selectors" name="department" id="department" tax="department"></select>
											</div>
											<div class="find-col toggler">
												<label for="location">Time of Day</label>
												<select class="the-selectors" name="time" id="time" tax="time_of_day"></select>
											</div>
											<div class="find-col toggler">
												<label for="location">Semester</label>
												<select class="the-selectors" name="semester" id="semester" tax="semester"></select>
											</div>
											<div class="find-col toggler">
												<label for="location">Lifelong Learning</label>
												<select class="the-selectors" name="lifelong-learning" id="lifelong_learning" tax="lifelong_learning"></select>
											</div>
											<div class="clear"></div>
										</form>
									</div>
                                    <hr>
									<div class="clear"></div>
									<div class="ajax-loading">Loading<br /><img src="<?php bloginfo('template_url');?>/images/loady.gif" /></div>
									<table class="results-holder stripe-table">
                                        <thead class="header_holder">
											<tr>
                                            <th class="schedule-head" scope="col">&nbsp</th>
                                            <th class="schedule-head" scope="col">Days</th>
                                            <th class="schedule-head" scope="col">Time</th>
                                            <th class="schedule-head" scope="col">Class Dates</th>
	                                        <th class="schedule-head" scope="col">Course Number</th>
	                                        <th class="schedule-head" scope="col">Credits</th>
                                            <th class="schedule-head" scope="col">Fee</th>
											</tr>
                                        </thead><!-- header -->
										<tbody id="display-results" class="mstarAjax"></tbody>
									</table>
                                    <hr>
									<div id="results-template" class="mstarAjax" data-structure="table">
										<ul class="schedule-entry">
											<li>
												<h2>
													<a type="permalink" target="_blank">
														<span type="function" key="the_title"></span>
													</a>
												</h2>
												<span type="tax" slug="department">&nbsp;</span>

											</li>
											<li>
												<span type="meta" key="_cmb_class_days">&nbsp;</span>
											</li>
											<li>
												<span type="meta" key="_cmb_class_start_time line-data">&nbsp;</span>
												<span type="meta" key="_cmb_class_end_time line-data">&nbsp;</span>
											</li>
											<li>
												<span type="date" key="_cmb_class_start_date line-data">&nbsp;</span>
												<span type="date" key="_cmb_class_end_date line-data">&nbsp;</span>
											</li>
											<li>
												<span type="meta" key="_cmb_course_number">&nbsp;</span>
											</li>
											<li>
												<span type="meta" key="_cmb_credit_hours">&nbsp;</span>
											</li>
											<li>
												<span type="money" key="_cmb_class_fee"></span>
											</div>
										</ul>
									</div>
								</div><!-- .entry-content -->
							</article><!-- #post-<? the_ID(); ?> -->
						</div><!-- #main -->
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
<? /*   */ ?>

<? get_footer(); ?>