<?php
global $alert_list;

$args = array(
    'post_type' => 'alert',
    'page_id' => $alert_list,
);

$loop = new wp_query($args);

if($loop->have_posts()) {
    echo '<div class="super-container alert-wrapper">';
    echo '<div class="container alert-holder">';
    while ($loop->have_posts()) : $loop->the_post();
        $alert_link = get_post_meta(get_the_ID(), '_cmb_alert_url', true);
        echo '<div class="sixteen columns alert">';
        echo '<img src="' . get_bloginfo('template_url') . '/images/alert-icon.png" class="alert-icon" alt="" role="presentation" />';
        the_title('<div class="alert-title"><h2>', '</h2></div>');
        echo '<div class="alert-body">';
        echo wp_trim_words(get_the_content(), 40, '...');
        if($alert_link){
            echo ' <a href="' . $alert_link . '">continue reading<span class="screen-reader-text"> ' . get_the_title() . '</span></a>';
        } else {
            echo ' <a href="' . get_permalink(get_the_ID()) . '">continue reading<span class="screen-reader-text"> ' . get_the_title() . '</span></a>';
        }
        echo '</div>';
        echo '</div>';
    endwhile;
    echo '</div>';
    echo '</div>';
}
wp_reset_query();