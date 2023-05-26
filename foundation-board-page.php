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
            <div id="content">
                <?php the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->

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
                                echo '<h2 class="team-header">'.$term->name.'</h2>';
                                $the_photoless = array();
                                while($loop->have_posts()) : $loop->the_post();
                                    if ( has_post_thumbnail() ) {
                                        $thumbnail = get_the_post_thumbnail($post->ID, 'staff-thumb', array('class' => 'staff-thumb')); ?>
                                        <div class="team-object">
                                            <?
                                                $title 	= get_post_meta($post->ID,'_cmb_title', true);
                                                echo $thumbnail;
                                                echo '<h3>'.get_the_title().'</h3>';
                                                echo '<p>'.$title.'</p>';
                                            ?>
                                        </div><?
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
                                            echo '<h3>'.$photoless['name'].'</h3>';
                                            echo '<p>'.$photoless['title'].'</p>';
                                        ?>
                                    </div><?
                                }
                                echo '<div class="clear"></div>';
                            }
                        ?>
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->

            </div><!-- #content -->
        </div><!-- #primary -->
    </div>
    </div>
    </div>

<? get_footer(); ?>