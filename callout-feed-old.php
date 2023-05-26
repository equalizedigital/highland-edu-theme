<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */


$image_1        = get_theme_mod( 'callout_pic_one' );
$alt_text_1     = get_theme_mod( 'callout_alt_text_one' );
$header_1       = get_theme_mod( 'callout_header_one' );
$title_1        = get_theme_mod( 'callout_title_one' );
$text_1         = get_theme_mod( 'callout_text_one' );
$link_1         = get_theme_mod( 'callout_link_one' );

$image_2        = get_theme_mod( 'callout_pic_two' );
$alt_text_2     = get_theme_mod( 'callout_alt_text_two' );
$header_2       = get_theme_mod( 'callout_header_two' );
$title_2        = get_theme_mod( 'callout_title_two' );
$text_2         = get_theme_mod( 'callout_text_two' );
$link_2         = get_theme_mod( 'callout_link_two' );

$image_3        = get_theme_mod( 'callout_pic_three' );
$alt_text_3     = get_theme_mod( 'callout_alt_text_three' );
$header_3       = get_theme_mod( 'callout_header_three' );
$title_3        = get_theme_mod( 'callout_title_three' );
$text_3         = get_theme_mod( 'callout_text_three' );
$link_3         = get_theme_mod( 'callout_link_three' );

$image_4        = get_theme_mod( 'callout_pic_four' );
$alt_text_4     = get_theme_mod( 'callout_alt_text_four' );
$header_4       = get_theme_mod( 'callout_header_four' );
$title_4        = get_theme_mod( 'callout_title_four' );
$text_4         = get_theme_mod( 'callout_text_four' );
$link_4         = get_theme_mod( 'callout_link_four' );

$image_5        = get_theme_mod( 'callout_pic_five' );
$alt_text_5     = get_theme_mod( 'callout_alt_text_five' );
$header_5       = get_theme_mod( 'callout_header_five' );
$title_5        = get_theme_mod( 'callout_title_five' );
$text_5         = get_theme_mod( 'callout_text_five' );
$link_5         = get_theme_mod( 'callout_link_five' );

$image_6        = get_theme_mod( 'callout_pic_six' );
$alt_text_6     = get_theme_mod( 'callout_alt_text_six' );
$header_6       = get_theme_mod( 'callout_header_six' );
$title_6        = get_theme_mod( 'callout_title_six' );
$text_6         = get_theme_mod( 'callout_text_six' );
$link_6         = get_theme_mod( 'callout_link_six' );



?>

<div class="callout" role="group" aria-label="item">
	<div class="callout-header">
		<div class="callout-title">
			<h2><? echo $header_1; ?></h2>
		</div>
		<div class="callout-icon">
			<img src="<? bloginfo('template_url'); ?>/images/callout_icon.jpg" alt="" />
		</div>
	</div>
	<div class="callout-content-holder">
		<img src="<? echo $image_1; ?>" alt="<? echo $alt_text_1; ?>" />
		<div class="callout-content">
			<h3 class="callout-subtitle"><? echo $title_1; ?></h3>
			<p><? echo $text_1; ?></p>
			<? if($link_1){ ?>
				<a href="<? echo get_permalink($link_1); ?>">read more</a>
			<? } ?>
		</div>
	</div>
</div>
<div class="callout" role="group" aria-label="item">
	<div class="callout-header">
		<div class="callout-title">
			<h2><? echo $header_2; ?></h2>
		</div>
		<div class="callout-icon">
			<img src="<? bloginfo('template_url'); ?>/images/callout_icon.jpg" alt="" />
		</div>
	</div>
	<div class="callout-content-holder">
		<img src="<? echo $image_2; ?>" alt="<? echo $alt_text_2; ?>" />
		<div class="callout-content">
			<h3 class="callout-subtitle"><? echo $title_2; ?></h3>
			<p><? echo $text_2; ?></p>
			<? if($link_2){ ?>
				<a href="<? echo get_permalink($link_2); ?>">read more</a>
			<? } ?>
		</div>
	</div>
</div>
<div class="callout" role="group" aria-label="item">
	<div class="callout-header">
		<div class="callout-title">
			<h2><? echo $header_3; ?></h2>
		</div>
		<div class="callout-icon">
			<img src="<? bloginfo('template_url'); ?>/images/callout_icon.jpg" alt="" />
		</div>
	</div>
	<div class="callout-content-holder">
		<img src="<? echo $image_3; ?>" alt="<? echo $alt_text_3; ?>" />
		<div class="callout-content">
			<h3 class="callout-subtitle"><? echo $title_3; ?></h3>
			<p><? echo $text_3; ?></p>
			<? if($link_3){ ?>
				<a href="<? echo get_permalink($link_3); ?>">read more</a>
			<? } ?>
		</div>
	</div>
</div>
<div class="callout" role="group" aria-label="item">
	<div class="callout-header">
		<div class="callout-title">
			<h2><? echo $header_4; ?></h2>
		</div>
		<div class="callout-icon">
			<img src="<? bloginfo('template_url'); ?>/images/callout_icon.jpg" alt="" />
		</div>
	</div>
	<div class="callout-content-holder">
		<img src="<? echo $image_4; ?>" alt="<? echo $alt_text_4; ?>" />
		<div class="callout-content">
			<h3 class="callout-subtitle"><? echo $title_4; ?></h3>
			<p><? echo $text_4; ?></p>
			<? if($link_4){ ?>
				<a href="<? echo get_permalink($link_4); ?>">read more</a>
			<? } ?>
		</div>
	</div>
</div>
<div class="callout" role="group" aria-label="item">
	<div class="callout-header">
		<div class="callout-title">
			<h2><? echo $header_5; ?></h2>
		</div>
		<div class="callout-icon">
			<img src="<? bloginfo('template_url'); ?>/images/callout_icon.jpg" alt="" />
		</div>
	</div>
	<div class="callout-content-holder">
		<img src="<? echo $image_5; ?>" alt="<? echo $alt_text_5; ?>" />
		<div class="callout-content">
			<h3 class="callout-subtitle"><? echo $title_5; ?></h3>
			<p><? echo $text_5; ?></p>
			<? if($link_5){ ?>
				<a href="<? echo get_permalink($link_5); ?>">read more</a>
			<? } ?>
		</div>
	</div>
</div>
<div class="callout" role="group" aria-label="item">
	<div class="callout-header">
		<div class="callout-title">
			<h2><? echo $header_6; ?></h2>
		</div>
		<div class="callout-icon">
			<img src="<? bloginfo('template_url'); ?>/images/callout_icon.jpg" alt="" />
		</div>
	</div>
	<div class="callout-content-holder">
		<img src="<? echo $image_6; ?>" alt="<? echo $alt_text_6; ?>" />
		<div class="callout-content">
			<h3 class="callout-subtitle"><? echo $title_6; ?></h3>
			<p><? echo $text_6; ?></p>
			<? if($link_6){ ?>
				<a href="<? echo get_permalink($link_6); ?>">read more</a>
			<? } ?>
		</div>
	</div>
</div>