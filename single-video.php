<?php 
if ( have_posts() ) while ( have_posts() ) : the_post(); 
	if(is_ajax()) { ?>
	<div class="vids">
    <?php } else { 
		get_header();
        get_template_part( 'sub-header', 'index' ); //the  header stuffs
		get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>
	
		<div class="sixteen columns alpha">
			<div id="primary" class="full-width">
				<div id="content">
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title() ?></h1>
                </header><!-- .entry-header -->
	<?php } ?>
		<div class="vid-holder">
		
		<iframe  name="theVids"
			id="vid-player" src="http://www.youtube.com/embed/<?php echo get_post_meta($post->ID, '_cmb_video_url', true); ?>?rel=0" 
			width="400" 
			height="225" 
			frameborder="0" 
			allowFullScreen> 				
		</iframe>	
								
		
		</div>
	<?php the_content();?>
  
<?php endwhile; 
	if(is_ajax()) { ?></div>
    <?php } else  { ?>
    	</div><!-- #content -->
		</div><!-- #primary -->
        </div><!-- sixteen -->
	<?php  
	get_footer();
	}
wp_reset_query(); ?>