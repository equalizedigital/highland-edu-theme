<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<div class="event-feed">
    <?php
    // Display 4 upcoming events using The Events Calendar list shortcode without calendar view button
    echo do_shortcode('[tribe_events_list limit="4"]');
    ?>
    
    <div class="clear"></div>
    <div class="button-holder">
        <a href="<?php echo esc_url(home_url('/event-calendar/')); ?>" class="blue-btn">All Campus Events</a>
    </div>
</div>

