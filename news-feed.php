<?
wp_reset_query();
$i = 1;
$max_num = 8;

$current_date = '';
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'news',
	'order' => 'DESC',
	'orderby' => 'date',
	'meta_query' => array(
		array(
			'key' => '_cmb_home_news_checkbox',
			'value' => 'on',
		),
	)
);
echo '<div class="no-slide">';
$loop = new WP_Query($args);
if ($loop->have_posts()) {
    while ($loop->have_posts()) : $loop->the_post();
        $news_excerpt = mstar_custom_excerpt($words = 10, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '', $echo = false);
        $allowed_tags = '<a>,<i>,<em>,<b>,<span>';
        $news_excerpt = preg_replace('/\[.*\]/', '', strip_tags($news_excerpt, $allowed_tags));
        $post_date = get_the_date( 'F j, Y' );
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'blog-thumb', true);

        echo '<a href="'.get_permalink().'">';
        echo '<div class="teaser-item ti-' . $i . '"';
        if (($i == 1) || ($i == 4)) {
            if (has_post_thumbnail()) {
                echo 'style="background-image:url(' . esc_html($thumb_url[0]) . ')"';
            }
        }
        echo '>';
			echo '<div class="arrow"></div>';
			echo '<div class="teaser-holder">';
				echo '<div class="news-date">';
					echo $post_date;
				echo '</div>';
				echo '<div class="news-excerpt">';
					//echo $news_excerpt;
                    the_title();
				echo '</div>';
			echo '</div>';
        echo '</div>';
        echo '</a>';

        $i++;
    endwhile;
    wp_reset_query();
}
echo '</div>';

echo '<div id="slides">';
	$loop = new WP_Query($args);
	if ($loop->have_posts()) {
		while ($loop->have_posts()) : $loop->the_post();
			$news_excerpt = mstar_custom_excerpt($words = 10, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '', $echo = false);
			$allowed_tags = '<a>,<i>,<em>,<b>,<span>';
			$news_excerpt = preg_replace('/\[.*\]/', '', strip_tags($news_excerpt, $allowed_tags));
			$post_date = get_the_date( 'F j, Y' );
			echo '<div class="teaser-item ti-' . $i . '">';
			echo '<div class="teaser-holder">';
				echo '<div class="news-date">';
						echo $post_date;
					echo '</div>';
					echo '<div class="news-excerpt">';
						//echo $news_excerpt;
						the_title();
					echo '</div>';
				echo '</div>';
			echo '</div>';

			$i++;
		endwhile;
		wp_reset_query();
	}
	?>
</div>


<div class="button-holder">
	<a href="<? bloginfo('url'); ?>/news" class="orng-btn">All News</a>
</div>
