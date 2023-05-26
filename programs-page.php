<?
	defined('ABSPATH') OR exit;
	/**
	 * Template Name: Programs Template
	 * Description: A full-width template with no sidebar
	 *
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
					<? the_post(); ?>
					<article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
						<!--<header class="entry-header">
							<h1 class="entry-title"><? the_title(); ?></h1>
						</header><!- - .entry-header -->
					<div class="entry-content">
						<?php the_content(); ?>

                        <div class="dog-runner">
                            <?php
                            $args = array(  'posts_per_page' => -1,
                                'post_type' => 'program-info',
                                'orderby' => 'menu_order',
                                'order' => 'DESC',
                            );
                            $i=0;
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                echo '<ul>';
                                while($loop->have_posts()) : $loop->the_post();
                                $external_url        = get_post_meta(get_the_id(), '_cmb_external_url', true);
                                if (!empty($external_url)) {
                                        $the_link = '<a href="'.$external_url.'" target="_blank">';
                                }
                                else {
                                    $the_link = '<a href="'.get_the_permalink().'">';
                                }

                                    echo '<li>';
                                    echo $the_link;
                                        echo get_the_post_thumbnail($post->ID, 'dog', array('class' => 'dog-thumb'));
                                    echo '</a>';
                                    echo '</li>';
                                    $i++;
                                endwhile;
                                wp_reset_query();
                            }
                            echo '<ul>';
                            ?>
                        </div>
					</article><!-- #post-<? the_ID(); ?> -->
				</div><!-- #content -->
			</div><!-- #primary -->
	    </div>
	</div>
</div>
                
<? get_footer(); ?>