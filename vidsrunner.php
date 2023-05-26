<div class="vidsrunner">
	<div class="vidsrunner-wrapper">	
	<?php
		
		global $gallery;
		$i=0;
		$args = array(
			'post_type' => 'video',
			'posts_per_page' => -1,
			'meta_key' => '_cmb_gallery_name',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'meta_query'=> array (
				array (
					'key' => '_cmb_gallery_name',
					'value' => $gallery,
					'compare' => '=',
				)
			)
		);						
		
		$loop = new WP_Query($args);	
			
		$results = '';	
				
		while($loop->have_posts()) : $loop->the_post();
			$thevids = get_post_meta($post->ID, '_cmb_video_url', true);
			if ($i==0) {
			?>
				<div class="vidsrunner-wrapper">	
					<iframe  name="<?php echo $gallery ?>"
						id="vid-player" src="http://www.youtube.com/embed/<?php echo $thevids; ?>?rel=0" 
						width="100%" 
						height="430" 
						frameborder="0" 
						allowFullScreen> 				
					</iframe>
				</div> <!-- end video-wrapper-->

		   <?php }
			   $results .= '<a href="http://www.youtube.com/embed/'.$thevids.'?rel=0" target="'.$gallery.'">';
	           $results .=  get_the_post_thumbnail($post->ID, 'video-sm-thumb', array('class' => 'video-sm-thumb'));
	           $results .=  '</a>';	      
	           
			   $i++;
			endwhile; ?>
			<div class="vidsrunner-thumbs">			
				<?php echo $results; 
					wp_reset_query();
				?>				
			</div>	
			
		</div><!-- end .player-wrapper -->
</div>
