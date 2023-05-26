<?php
defined('ABSPATH') OR exit;
/**
 * Template Name: Cougar Updates Page
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */


get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

    <div class="super-container interior-page">
        <div class="container">
            <div class="sixteen columns alpha">
                <div id="primary" class="full-width">
                    <div id="content">
                        <?php the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php the_content(); ?>
                                <?php
                                $args = array(
                                    'posts_per_page' => -1,
                                    'post_type' => 'cougar-corner',
                                    'order' => 'DESC',
                                    'orderby' => 'date',
                                );
                                $loop = new WP_Query($args);
                                //news feed goes here, use inc var to label each, need to ensure gap integrity on individual boxes.
                                if ($loop->have_posts()) { ?><?
                                    while ($loop->have_posts()) : $loop->the_post();
                                        $news_excerpt = mstar_custom_excerpt($words = 10, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '', $echo = false);
                                        $allowed_tags = '<a>,<i>,<em>,<b>,<span>';
                                        $news_excerpt = preg_replace('/\[.*\]/', '', strip_tags($news_excerpt, $allowed_tags));
                                        $post_date = get_the_date( 'F j, Y' ); ?>
                                        <div class="update-feed-item col<? echo $i; ?>">
                                            <div class="update-excerpt">
                                                <a href="<? echo get_permalink(); ?>">
                                                    <h3 class="update-title"><? the_title(); ?></h3>
                                                </a>
                                                <p class="update-date"><? echo get_the_time('F jS, Y'); ?></p>
                                                <? mstar_custom_excerpt($words = 30, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '' ); ?>
                                            </div>
                                        </div> <?
                                        $i++;
                                    endwhile;
                                    wp_reset_query();
                                }
                                ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-<?php the_ID(); ?> -->

                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>

<? get_footer(); ?>