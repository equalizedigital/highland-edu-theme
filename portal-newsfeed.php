<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<? global $client_type; ?>
<div class="news-feed">
	<?
	wp_reset_query();
	$i = 1;
	$max_num = 10;

	$current_date = '';
	$args = array(
		'posts_per_page' => 5,
		'post_type' => 'announcement',
		'order' => 'DESC',
		'orderby' => 'date',
	);

	if($client_type == "staff"){
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => 'staff',
			),/*
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => 'student',
			),*/
		);
	} else {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => 'student',
			),
		);
	}

	$loop = new WP_Query($args);
	//news feed goes here, use inc var to label each, need to ensure gap integrity on individual boxes.
	if ($loop->have_posts()) { ?>
		<div class="literal sixteen columns alpha omega">
			<h3>announcements</h3>
		</div><?
		while ($loop->have_posts() && $i <= $max_num) : $loop->the_post();
			$news_excerpt = mstar_custom_excerpt($words = 10, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '', $echo = false);
			$allowed_tags = '<a>,<i>,<em>,<b>,<span>';
			$news_excerpt = preg_replace('/\[.*\]/', '', strip_tags($news_excerpt, $allowed_tags));
			$post_date = get_the_date( 'F j, Y' ); ?>
			<div class="news-feed-item col<? echo $i; ?>">
				<div class="news-excerpt">
					<a href="<? echo get_permalink(); ?>">
						<? the_title(); ?>
					</a>
				</div>
			</div> <?

			$i++;
		endwhile;
		echo "<a href='".get_permalink(5409)."'>Submit News</a>";
		if($client_type == "staff"){
			echo "<a href='".get_permalink(5411)."'>Submit Staff News</a>";
		}
		wp_reset_query();
	}
	?>
</div>


