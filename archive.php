<?php
    /**
     * @package WordPress
     * @subpackage WP-Skeleton
     */

    get_header();

    get_template_part( 'sub-header', 'index' ); //the  header stuffs
    get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
    <div class="super-container title-holder">
        <div class="container">
            <div class="sixteen columns alpha omega primary-nav-holder">
                <header>
                    <h1><? the_title(); ?></h1>
                </header><!-- access -->
            </div><!-- menu-holder -->
        </div>
    </div>

    <div class="super-container interior-page">
        <div class="container">
            <div class="sixteen columns alpha">
                <div id="primary" class="full-width">
                    <div id="content">

                        <?php
                        if(have_posts()):
                            $post_type = get_post_type();

                            if($post_type == 'video'){
                                // do something else
                                get_template_part('media-videos');
                            } elseif($post_type == 'podcast'){
                                // do something else
                                get_template_part('media-podcasts');
                            } else {
                                ?>
                                <div class="two-thirds column alpha">
                                     <main id="main-content" class="main content">
                                        <div class="entry-content">

                                            <?php

                                            $post_type_object = get_post_type_object($post_type);
                                            $month = get_query_var('monthnum');
                                            $year  = get_query_var('year');
                                            $queried_object = get_queried_object();
                                            ?>
                                            <header class="entry-header">
                                                <?
                                                if(is_tax()) {
                                                    echo '<h1 class="entry-title">'.$post_type_object->labels->name.': '.$queried_object->name.'</h1>';
                                                } elseif(is_author()) {
                                                    echo '<h1 class="entry-title">Author: '.get_the_author_meta('display_name').'</h1>';
                                                } elseif(!empty($month)) {
                                                    echo '<h1 class="entry-title">'.$queried_object->labels->name.': '.date('F',mktime(0,0,0,$month,10)).(!empty($year) ? ', '.$year : '').'</h1>';
                                                } else {
                                                    echo '<h1 class="entry-title">'.$queried_object->labels->name.'</h1>';
                                                }
                                                ?>
                                            </header>
                                            <?

                                            while (have_posts()) : the_post();
                                                ?>
                                                <article id="post-<?php the_ID(); ?>" class="blog-object">
                                                    <div class="blog-entry-meta">
                                                        <small><?php the_time('F jS, Y'); ?></small>
                                                    </div>
                                                    <?php if(has_post_thumbnail()) { ?>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                            <?php the_post_thumbnail('blog-small', array('class' => "lefty archive-thumb blog-small")); ?>
                                                        </a>
                                                    <?php } ?>
                                                    <h2 class="blog-title">
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                    </h2>
                                                    <?php mstar_custom_excerpt($words = 40, $link_text = 'read more', $allowed_tags = '', $container = 'p', $smileys = 'no', $echo = 'true', $link = '' );?>

                                                </article>
                                            <?php
                                            endwhile;
                                            ?>

                                            <div class="navigation">
                                                <span class="older"><?php next_posts_link('« Older') ?></span>
                                                <span class="newer"><?php previous_posts_link('Newer »') ?></span>
                                            </div><!-- .navigation -->

                                        </div>
                                    </main><!-- #main -->
                                </div><!-- two-thirds -->
                                <?php get_sidebar(); ?>
                                <?php
                            }
                        endif;
                        ?>
        
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>

<?php get_footer(); ?>