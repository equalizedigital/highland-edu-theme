<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<div class="event-feed">
    <?
    wp_reset_query();
    $i = 1;
    $max_num = 8;
    $yesterday = strtotime('yesterday');
    $current_date = '';
    $args = array(  'posts_per_page' => 4,
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
                                <p><? echo date('M', $start_date); ?></p>
                                <p><? echo date('d', $start_date); ?></p>
                            </div>
                            <div class="event-feed-details">
                                <? $current_date = $start_date; ?>

                                <div class="event-feed-text">
                                    <p>
                                        <?
                                        echo get_the_title();
                                        if($free_event){
                                            ?><img src="<? bloginfo('template_url'); ?>/images/free_icon.jpg" alt="This event is free." /><?
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
                </div>
            </a>
            </div><?
            $i++;
        endwhile;
        wp_reset_query();
    }
    ?>
    <div class="clear"></div>
    <div class="button-holder">
        <a href="<?php echo get_permalink(5441)?>" class="blue-btn">All Campus Events</a>
    </div>
</div>

