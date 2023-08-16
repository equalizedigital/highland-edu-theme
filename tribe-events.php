<?php
/* Template Name: Events template */

get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
<main id="main-content">
	<?php
	if ( ! is_singular( 'tribe_events' ) ) :
		?>
		<div class="super-container title-holder">
			<div class="container">
				<div class="sixteen columns alpha omega primary-nav-holder">
					<h1>
					Campus Calendar
					</h1>
				</div><!-- menu-holder -->
			</div>
		</div>
	<?php endif; ?>
	<div class="super-container interior-page">
		<div class="container">
			<div class="sixteen columns alpha">
				<div id="primary" class="full-width">
					<div class="main">
						<div class="main">
							<?php the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <? post_class(); ?> role="article">
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</article>
						</div><!-- #main -->
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</main>

<? get_footer(); ?>