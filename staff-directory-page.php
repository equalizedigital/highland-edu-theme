<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Staff Directory
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
					<main id="main-content" class="main">
						<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
							<header class="entry-header">
								<h1 class="entry-title"><? the_title(); ?></h1>
							</header><!-- .entry-header -->
							<div class="entry-content staff-directory">
								<div id="srch-step-one" class="mstarAjax">
									<? /* these hidden inputs are used to set default values for the ajax args */ ?>
									<input type="hidden" value="staff" id="post-type-holder" target="srch-step-two">
									<input type="hidden" value="spec" tax="job-member-position" listener="spec" id="sort-by-holder">
									<input type="hidden" id="tot_posts" value="<?php echo wp_count_posts('staff')->publish; ?>" />
									<input type="hidden" value="10" id="posts-per-page-holder" />
									<input type="hidden" value="ASC" id="order-holder" />
									<input type="hidden" value="meta_value" key="_cmb_staff_lname" id="order-by-holder" />
									<input type="hidden" value="<? the_permalink(); ?>" id="permalink">
									<input type="hidden" value="a-to-z" id="search-by-holder" />
									<input type="hidden" id="set-toggle" key="_cmb_staff_lname" compare="BETWEEN" comp_type="CHAR" value="autoset" />
								</div>
								<div name="search_options" id="srch-step-two" class="mstarAjax search-options">
									<form id="staff-finder">
										<div class="find-col tt-search reset-holder staff-search">
											<label for="search_term">Search By Last Name (above options not available)</label>
											<span class="delete-me">
												<input class="the-selectors tts ref-select" type="text" name="search_term" id="search_box" placeholder="Type to Search" <?php if(!empty($search_term)) echo 'value="'.$search_term.'"';?> key="_cmb_staff_lname" compare_key="LIKE">
												<input type="button" name="clear-me" id="clear-me" value="clear" style="width: 15%">
												<div id="filtered_list" class="filtered_by"></div>
											</span>
										</div>
                                        <!--<div class="find-col toggler">
                                            <label for="location">Staff Type</label>
                                            <select class="the-selectors" name="type" id="type" tax="staff-member-type"></select>
                                            <div class="search-options-overlay"><p>Location selection is not available when using type to search.</p></div>
                                        </div>-->
                                        <div class="find-col toggler">
                                            <label for="location">Department</label>
                                            <select class="the-selectors" name="location" id="loc" tax="department"></select>
                                            <div class="search-options-overlay"><p>Location selection is not available when using type to search.</p></div>
                                        </div>
										<div class="clear"></div><br />
									</form>
								</div>
                                <hr>
								<div class="results-holder">
									<div class="clear"></div>
									<div id="ajax-pagination-top"></div>
									<div class="clear"></div>
									<hr>
									<div class="ajax-loading">Loading<br /><img src="<?php bloginfo('template_url');?>/images/loady.gif" /></div>
									<div id="display-results" class="mstarAjax"></div>
								</div>
								<div id="results-template" class="mstarAjax">
									<li class="staff-entry"><div><h2><span type="function" key="the_title">&nbsp;</span></h2></div><div><span type="meta" key="_cmb_staff_grade">&nbsp;</span></div><div><span type="tax" slug="staff-member-location">&nbsp;</span></div><div><a type="tel"><span type="meta" key="_cmb_staff_phone">&nbsp;</span></a></div><div><a type="email"><span type="meta" key="_cmb_staff_email">&nbsp;</span></a></div></li>
								</div>
							</div><!-- .entry-content -->
						</article><!-- #post-<? the_ID(); ?> -->
					</main><!-- #main -->
				</div><!-- #content -->
			</div><!-- #primary -->
		</div>
	</div>
</div>

<? get_footer(); ?>