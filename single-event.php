 <?php
	/**
	 * The Template for displaying all single posts.
	 *
	 * @package WordPress
	 * @subpackage Twenty_Ten
	 * @since Twenty Ten 1.0
	 */


	if(!is_ajax()){
		get_header();
 get_template_part( 'sub-header', 'index' ); //the  header stuffs
		get_template_part('menu', 'index'); ?>
		<div class="super-container interior-page">
			<div class="container">
				<div class="sixteen columns alpha">
					<div id="primary" class="full-width">
						<div id="content">
							<div class="two-thirds column alpha">
								<div class="main">
	<? } ?>
		    
	<?
		the_post();
		the_title('<h1 tabindex="-1">', '</h1>');
		$post->event_location 	= get_post_meta($post->ID, '_cmb_event_location', true);
		$post->start_date 		= get_post_meta($post->ID, '_cmb_start_date', true);
		$post->frequency		= get_post_meta($post->ID, '_cmb_frequency', true);
		$post->custom_weekly	= get_post_meta($post->ID, '_cmb_custom_weekly', false);
		$post->start_time 		= get_post_meta($post->ID, '_cmb_start_time', true);
		$post->end_date			= get_post_meta($post->ID, '_cmb_end_date', true);
		$post->end_time			= get_post_meta($post->ID, '_cmb_end_time', true);

		if(!get_post_meta($post->ID, '_cmb_date_hider', true) == 'on'){
			switch ($post->frequency){
				case 'custom':
					$daysOfTheWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
					foreach($post->custom_weekly as &$week_day){
						$week_day = $daysOfTheWeek[$week_day];
					}
					$day = implode(', ', $post->custom_weekly);
					$post->temporal = 'Every '.$day;
					break;

				case 'weekly_1':
					$day = date('l', $post->start_date);
					$post->temporal = 'Every '.$day;
					break;

				case 'weekly_2':
					$day = date('l', $post->start_date);
					$post->temporal = 'Every other '.$day;
					break;

				case 'weekly_3':
					$day = date('l', $post->start_date);
					$post->temporal = 'Every third '.$day;
					break;

				case 'weekly_4':
					$day = date('l', $post->start_date);
					$post->temporal = 'Every fourth '.$day;
					break;

				case 'monthly_1':
					$day = date('jS', $post->start_date);
					$post->temporal = 'Every month on the '.$day;
					break;

				case 'monthly_2':
					$day = date('jS', $post->start_date);
					$post->temporal = 'Every two months on the '.$day;
					break;

				case 'monthly_3':
					$day = date('jS', $post->start_date);
					$post->temporal = 'Every three months on the '.$day;
					break;

				case 'monthly_first':
					$day = date('l', $post->start_date);
					$post->temporal = 'The first '.$day.' of every month';
					break;

				case 'monthly_second':
					$day = date('l', $post->start_date);
					$post->temporal = 'The second '.$day.' of every month';
					break;

				case 'monthly_third':
					$day = date('l', $post->start_date);
					$post->temporal = 'The third '.$day.' of every month';
					break;

				case 'monthly_fourth':
					$day = date('l', $post->start_date);
					$post->temporal = 'The fourth '.$day.' of every month';
					break;

				case 'monthly_last':
					$day = date('l', $post->start_date);
					$post->temporal = 'The last '.$day.' of every month';
					break;

				default:
					$post->temporal = NULL;
					break;
			} ?>
			<div class="event-single">
				<div class="event-date">
					<p>
						<?
							// frequency
							if(!empty($post->temporal)){
								echo $post->temporal,'<br />';
							}
							echo date('l, F j, Y', $post->start_date);

							if($post->start_date !== $post->end_date){
								echo ' - ' . date('l, F j, Y', $post->end_date);
							}
						?>
					</p>
				</div>
				<?
					if(!empty($post->start_time)){
						echo '<div class="event-time">';
						echo ltrim($post->start_time, '0');
						if(!empty($post->end_time)){
							echo ' - ' . ltrim($post->end_time, '0');
						}
						echo '</div>';
					}
		}
		if(!empty($post->event_location)){
			echo '<br />Location: '.$post->event_location.'<br />';
		}
	?>
	<div class="event-description">
		<?
			the_post_thumbnail('event-featured-image');
			the_content();
		?>
	</div>
	<? if(!is_ajax()){ ?>
										</div><!-- .entry-content -->
		                            </article><!-- #post-<?php the_ID(); ?> -->
								</div><!-- #main -->
			                </div><!-- two-thirds -->
							<?php get_sidebar(); ?>
						</div><!-- #content -->
					</div><!-- #primary -->
				</div>
			</div>
		</div><?
        get_footer();
	} else {
		wp_reset_query();
	}