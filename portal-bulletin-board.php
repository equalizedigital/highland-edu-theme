<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>

<div class="news-feed">
	<?
	wp_reset_query();
	$i = 1;
	$max_num = 12;

	$current_date = '';
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'bulletin-board',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		/*'meta_query' => array(
			array(
				'key' => '_cmb_home_page_checkbox',
				'value' => 'on',
			),
		)*/
	);
	$loop = new WP_Query($args);
	//news feed goes here, use inc var to label each, need to ensure gap integrity on individual boxes.
	if ($loop->have_posts()) { ?>
		<div class="literal sixteen columns alpha omega">
			<h3>Student Bulletin Board</h3>
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
		echo "<a href='".get_permalink(5413)."'>Submit Bulletin Board Item</a>";
		wp_reset_query();
	}
	?>
</div>


