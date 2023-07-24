<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title

$parallax_bg1           = get_theme_mod( 'highlight_pic_one' );
$parallax_title_1       = get_theme_mod( 'hightlight_text_one' );
$parallax_link_1        = get_theme_mod( 'highlight_area_one' );
$parallax_btn_text_1    = get_theme_mod( 'hightlight_button_text_one' );

$parallax_bg2           = get_theme_mod( 'highlight_pic_two' );
$parallax_title_2       = get_theme_mod( 'hightlight_text_two' );
?>
    <div role="main">
        <div class="super-container home-page">
            <div class="container">
                <div class="sixteen columns alpha">
                    <div id="primary" class="full-width">
                        <div id="content">
                            <main id="main-content" class="main">
                                <? the_post(); ?>
                                <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                                    <div class="entry-content">
                                        <h1 class="story-header">highland stories</h1>
                                        <?
                                        $story_args = array(
                                            'post_type' => 'story',
                                            'orderby'   => 'rand',
                                            'posts_per_page' => 1,
                                        );

                                        $story_query = new WP_Query($story_args);
                                        if($story_query->have_posts()) {
                                            while ($story_query->have_posts() && $i <= $max_num) : $story_query->the_post();
                                                $quoted = get_post_meta(get_the_id(), '_cmb_quoted', true);
                                                $story_img = get_the_post_thumbnail(get_the_id(), 'story-thumb');
                                                $story_excerpt = mstar_custom_excerpt($words = 15, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '', $echo = false);
                                                $allowed_tags = '<a>,<i>,<em>,<b>,<span>';
                                                $story_excerpt = preg_replace('/\[.*\]/', '', strip_tags($story_excerpt, $allowed_tags)); ?>
                                                <div class="stories-holder">
                                                <div class="stories-img">
                                                    <? echo $story_img; ?>
                                                </div>
                                                <div class="story-excerpt">
                                                    <p>"<? echo $story_excerpt; ?>"</p>
                                                    <p class="the-quoted">- <? echo $quoted; ?></p>
                                                </div>
                                                </div><?
                                            endwhile;
                                        }
                                        ?>
                                    </div><!-- .entry-content -->
                                </article><!-- #post-<? the_ID(); ?> -->
                            </main><!-- #main -->
                        </div><!-- #content -->
                    </div><!-- #primary -->
                </div>
            </div>
        </div>

        <div class="super-container news-holder">
            <div class="container news-feed">
                <h1>highland news</h1>
                <? get_template_part('news-feed'); ?>
            </div>
        </div>

        <div class="literal super-container apply-area parallax-area" style="background-image: url(<? echo $parallax_bg1; ?>);">
            <div class="container">
                <div class="apply-online">
                    <p><? echo $parallax_title_1; ?></p>
                    <div class="button-holder">
                        <a href="<? echo get_permalink($parallax_link_1);?>" class="orng-btn"><? echo $parallax_btn_text_1; ?></a>
                    </div>
                </div>
            </div><!-- container -->
        </div><!-- super-container -->

        <div class="super-container callout-holder">
            <div class="container">
                <? get_template_part('callout-feed'); ?>
            </div>
        </div>

        <div class="literal super-container highlights-area parallax-area" style="background-image: url(<? echo $parallax_bg2; ?>);">
            <div class="container">
                <div class="highlights">
                    <p><? echo $parallax_title_2; ?></p>
                    <div class="highlights-holder">
                        <a href="http://bookstore.highland.edu/home.aspx" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/book_store.png" alt="Icon for the Bookstore" />
                        </a><!--
                    The comments eliminate unintentional white space created by browsers interpreting new lines as spaces
                    --><a href="<? echo get_permalink(5353);?>" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/library.png" alt="Icon for the Library" />
                        </a><!--
                    --><a href="<? echo get_permalink(429);?>" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/athletics.png" alt="Icon for the Atheletics Department" />
                        </a><!--
                    --><a href="<? echo get_permalink(444);?>" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/fine_arts.png" alt="Icon for the Fine Arts Department" />
                        </a><!--
                    --><a href="<? echo get_permalink(5360);?>" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/campus_life.png" alt="Icon for Campus Life" />
                        </a>
                    </div>
                </div>
            </div><!-- container -->
        </div><!-- super-container -->


        <div class="super-container events-holder">
            <div class="events-header">
                <p>campus events</p>
            </div>
            <div class="container">
                <? get_template_part('events-feed'); ?>
            </div>
        </div>
    </div>

<? get_footer(); ?>