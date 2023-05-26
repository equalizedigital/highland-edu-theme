<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<h2>FAQs</h2>
<div class="faqs-feed">
	<?
	wp_reset_query();
	$i = 1;
	$max_num = 4;

	$current_date = '';
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'faq',
		'order' => 'ASC',
		'orderby' => 'menu_order',
	);
	$loop = new WP_Query($args);
	//news feed goes here, use inc var to label each, need to ensure gap integrity on individual boxes.
	if ($loop->have_posts()) { ?>
		<div class="clear"></div> <?
		while ($loop->have_posts()) : $loop->the_post();
			$news_excerpt = mstar_custom_excerpt($words = 10, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '', $echo = false);
			$allowed_tags = '<a>,<i>,<em>,<b>,<span>';
			$news_excerpt = preg_replace('/\[.*\]/', '', strip_tags($news_excerpt, $allowed_tags));
			$post_date = get_the_date( 'F j, Y' ); ?>
			<div class="accordion col<? echo $i; ?>" aria-controls="panel-<? echo $i; ?>" onclick="toggleAccordion()" aria-expanded="false">
                <h3><button><? the_title(); ?></button></h3>
                <div class="panel" id="panel-<? echo $i; ?>">
                    <p>
                        <? the_content(); ?>
                    </p>
                </div>
            </div>
			<?

			$i++;
		endwhile;
		wp_reset_query();
	}
	?>
    <script>
        function toggleAccordion() {
          const accordion = document.querySelector('.accordion');
          const expanded = accordion.getAttribute('aria-expanded') === 'true' || false;
          accordion.setAttribute('aria-expanded', !expanded);
        }
    </script>
</div>