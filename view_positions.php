<?
defined('ABSPATH') OR exit;
/**
 * Template Name: View Positions Page
 * Description: A full-width template with no sidebar
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
<main id="main-content">
	<div class="super-container interior-page">
		<div class="container">
			<div class="two-thirds column alpha">
				<div id="primary" class="full-width">
					<div id="content">
						<? the_post(); ?>
						<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
							<header class="entry-header">
								<h1 class="entry-title"><? the_title(); ?></h1>
							</header><!-- .entry-header -->
							<div class="entry-content">
								<? the_content(); ?>
								<div class="job-posting-wrapper">
									<script LANGUAGE="javascript">
										var URL = "http://www.applitrack.com/highlandcollege/OnlineApp/JobPostings/Output.asp"
										var Search = location.search
										if (Search == "") {Search = "?"} else {Search += "&"}
										ScriptLoc = URL + Search
										document.write('<scr' + 'ipt language=javascript src="' + ScriptLoc + '"></scr' + 'ipt>')
									</script>
									<noscript><a href="http://www.applitrack.com/highlandcollege/onlineapp/" >Click here to view the Job Postings.</a></noscript>
								</div>
							</div><!-- .entry-content -->
						</article><!-- #post-<? the_ID(); ?> -->
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
			<? get_sidebar(); ?>
		</div>
	</div>
</main><!-- #main-content -->
<? get_footer(); ?>