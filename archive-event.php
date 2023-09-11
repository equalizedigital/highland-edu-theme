<?
	defined('ABSPATH') OR exit;
	/**
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */

	get_header();
    get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
<main id="main-content">

	<div class="super-container title-holder">
		<div class="container">
			<div class="sixteen columns alpha omega primary-nav-holder">
				<header>
					<h1>Campus Events</h1>
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
                    <main class="main" id="main-content">

	                  <div class="event-feed">
                        <?
                            wp_reset_query();
                            $i = 1;
                            $max_num = 8;
                            $yesterday = strtotime('yesterday');
                            $current_date = '';
                            $args = array(  'posts_per_page' => -1,
                                'post_type' => 'event',
                                'meta_key' => '_cmb_start_date',
                                'order' => 'ASC',
                                'meta_query' => array(
                                    'relationship' => 'AND',
                                    /*array(
                                        'key' => '_cmb_home_page_checkbox',
                                        'value' => 'on',
                                    ),*/
                                    array(
                                        'key' => '_cmb_start_date',
                                        'value' => $yesterday,
                                        'compare' => '>',
                                    ),
                                ),
                                'orderby' => array(
                                    'meta_value_num' => 'ASC',
                                    'menu_order' => 'ASC',
                                ),
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                while ($loop->have_posts() && $i <= $max_num) : $loop->the_post();
                                    $post->start_date 		= get_post_meta($post->ID, '_cmb_start_date', true);
                                    $post->start_time 		= get_post_meta($post->ID, '_cmb_start_time', true);
                                    $post->end_date			= get_post_meta($post->ID, '_cmb_end_date', true);
                                    $post->end_time			= get_post_meta($post->ID, '_cmb_end_time', true);
                                    $start_date  = get_post_meta(get_the_ID(), '_cmb_start_date', true);
                                    $start_time  = get_post_meta(get_the_ID(), '_cmb_start_time', true);
                                    $end_date  = get_post_meta(get_the_ID(), '_cmb_end_date', true);
                                    $end_time  = get_post_meta(get_the_ID(), '_cmb_end_time', true);
                                    $event_location  = get_post_meta(get_the_ID(), '_cmb_event_location', true);
                                    $free_event  = get_post_meta(get_the_ID(), '_cmb_free_event_check', true);
                                    if ( $start_date <= $yesterday ) {
                                        continue;
                                    } ?>
                                    <div class="event-item">
                                    <a href="<? echo get_permalink(); ?>" class="fancybox fancybox.ajax">
                                        <div class="literal event-content-holder">
                                            <div class="event-content">
                                                <div class="event-feed-item">
	                                                <div class="event-feed-date">
                                                        <p><? echo date('M', $start_date); ?><span><? echo date('d', $start_date); ?></span></p>
                                                    </div>

                                                    <? $current_date = $start_date; ?>

                                                    <div class="event-feed-text">
                                                        <p>
                                                            <?
                                                            echo get_the_title();
                                                            if($free_event){
                                                                ?><img src="<? bloginfo('template_url'); ?>/images/free_icon.jpg" /><?
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <div class="event-time">
                                                        <p>
	                                                        <?
		                                                        echo $start_time;
		                                                        if($end_time) {
			                                                        echo " to " . $end_time;
		                                                        }
	                                                        ?>
                                                        </p>
                                                    </div>

                                                    <div class="event-location">
                                                        <p><? echo $event_location; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
	                                <a href="<? echo get_permalink(); ?>" class="event-feed-link fancybox fancybox.ajax">view this event</a>
                                    </div><?
                                    $i++;
                                endwhile;
                                wp_reset_query();
                            }
                        ?>
                      </div>
                        </div><!-- #main -->
                    </main><!-- two-thirds -->
                    <? get_sidebar(); ?>
                </div><!-- #content -->
            </div><!-- #primary -->
        </div>
    </div>
</div>

</main>
<? get_footer(); ?>
