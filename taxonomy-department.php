<?
    defined('ABSPATH') OR exit;
    /**
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
                        <div class="two-thirds column alpha omega">
                            <div class="main">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
                                    <?php
                                        $queried_object = get_queried_object();
                                        $term_name = $queried_object->taxonomy;
                                        $term_id = $queried_object->term_id;
                                    ?>
                                    <header class="entry-header">
                                        <h1 class="entry-title"><?php echo $queried_object->name;?></h1>
                                    </header><!-- .entry-header -->
                                    <div class="entry-content">
                                        <?php
                                            echo term_description($term_id, $term_name);

                                            $class_args = array(
                                                'post_type' => 'class',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => $term_name,
                                                        'field' => 'term_id',
                                                        'terms' => $term_id
                                                    )
                                                )
                                            );
                                            $class_loop = new WP_Query( $class_args );

                                            //var_viewer($class_loop);

                                            if($class_loop->have_posts()) {
                                                echo '<hr />';
                                                echo '<h2>Related Classes</h2>';
                                                echo '<ul>';
                                                while ($class_loop->have_posts()) : $class_loop->the_post();
                                                    echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                                                endwhile;
                                                echo '</ul>';
                                            }
                                            wp_reset_postdata();
                                        ?>
                                    </div><!-- .entry-content -->
                                </article><!-- #post-<?php the_ID(); ?> -->
                            </div><!-- #main -->
                        </div>
                        <? get_sidebar('academics'); ?>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>
<?php get_footer(); ?>