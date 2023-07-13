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
    <main id="content" role="main">
        <div class="super-container news-holder">
            <div class="container news-feed">
    			<div class="hcc-page-title-container">
	    			<h1>It’s All Here at Highland</h1>
    			</div>
                <div class="two-thirds column alpha omega" role="group" aria-label="News">
                    <h2>News</h2>
                    <hr>
                    <? get_template_part('news-feed-new'); ?>
                    <div class="button-holder">
                        <a href="<? bloginfo('url'); ?>/news" class="orng-btn">All News</a>
                    </div>
                </div>
                <div class="one-third column alpha omega" role="group" aria-label="Events">
                    <h2>Events</h2>
                    <hr>
                    <? get_template_part('events-feed-new'); ?>
                    <div class="button-holder">
                        <a href="<?php echo get_permalink(5441)?>" class="blue-btn">Events Calendar</a>
                    </div>
                    <div class="button-holder">
                        <a href="<? echo get_permalink(451985); ?>" class="blue-btn">Academic Calendar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="literal super-container apply-area parallax-area" style="background-image: url(<? echo $parallax_bg1; ?>);">
            <div class="container">
                <div class="apply-online">
                    <h2><? echo $parallax_title_1; ?></h2>
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

        <div class="literal super-container highlights-area parallax-area">
            <div class="container">
                <div class="highlights">
                    <h2><? echo $parallax_title_2; ?></h2>
                    <div class="highlights-holder">
                        <a href="http://bookstore.highland.edu/home.aspx" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/book_store.png" alt="Bookstore"/>
                        </a><!--
                    The comments eliminate unintentional white space created by browsers interpreting new lines as spaces
                    --><a href="/library/" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/library.png" alt="Library" />
                        </a><!--
                    --><a href="https://highlandcougars.com/" target="_blank" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/athletics.png" alt="Athletics" />
                        </a><!--
                    --><a href="/finearts/" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/fine_arts.png" alt="Fine Arts" />
                        </a><!--
                    --><a href="/admissions/new-students/" class="highlight-btn">
                            <img src="<? bloginfo('template_url'); ?>/images/campus_life.png" alt="Campus Life" />
                        </a>
                    </div>
                </div>
            </div><!-- container -->
        </div><!-- super-container -->


	</main>
<? get_footer(); ?>