<?php
defined('ABSPATH') OR exit;
/**
 * Template Name: Foundation Board Page
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
            <main id="main-content">
                <?php the_post(); ?>

                <h1 class="entry-title"><?php the_title(); ?></h1>

                <div class="entry-content">
                    <?php
                        $args = array(
                            'post_type' => 'foundation-board',
                            'posts_per_page' => -1,
                            /*'team-member-type' => $term->slug,*/
                            'orderby' => 'meta_value',
                            'meta_key' => '_cmb_lname',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query($args);

                        if($loop->have_posts()){
                            $the_photoless = array();
                            echo "<ul class='team-list'>";
                            while($loop->have_posts()) : $loop->the_post();
                                if ( has_post_thumbnail() ) {
                                    $alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
                                    $file_name = basename(get_attached_file(get_post_thumbnail_id($post->ID)));
                                    if (empty($alt) && 'blank.jpg' != $file_name) {
                                        $alt = get_the_title();
                                    }
                                    $thumbnail = get_the_post_thumbnail($post->ID, 'staff-thumb', array('class' => 'staff-thumb', 'alt'=> $alt )); ?>
                                    <li class="team-object">
                                        <?
                                            $title 	= get_post_meta($post->ID,'_cmb_title', true);
                                            echo $thumbnail;
                                            echo '<h2>'.get_the_title().'</h2>';
                                            echo '<p>'.$title.'</p>';
                                        ?>
                                    </li><?
                                }
                                else {
                                    $pl_array = array();
                                    $pl_array['name'] = get_the_title();
                                    $pl_array['title'] = get_post_meta($post->ID, '_cmb_title', true);
                                    $the_photoless[] = $pl_array;
                                }
                            endwhile;
                            echo '<div class="clear"></div>';
                            wp_reset_query();
                            foreach ($the_photoless as $photoless){ ?>
                                <div class="team-object photoless">
                                    <?
                                        echo '<h2>'.$photoless['name'].'</h2>';
                                        echo '<p>'.$photoless['title'].'</p>';
                                    ?>
                                </div><?
                            }
                            echo '<div class="clear"></div>';
                        }
                    ?>
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

            </main><!-- #content -->
        </div><!-- #primary -->
    </div>
    </div>
    </div>

<? get_footer(); ?>