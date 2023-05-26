<?
    defined('ABSPATH') OR exit;
    /**
     * Template Name: Test Page
     * Description: Test new applications for the site.
     *
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

<div class="super-container">
    <div class="container">
        <div class="sixteen columns alpha omega">
            <?
                $time = time();
                var_viewer($time);
            echo date('m-d-Y', strtotime('today'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+1 day'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+2 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+3 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+4 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+5 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+6 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+7 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+8 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+9 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+10 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+11 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+12 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+13 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+14 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+15 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+16 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+17 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+18 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+19 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+20 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+21 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+22 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+23 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+24 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+25 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+26 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+27 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+28 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+29 days'));
            echo '<br />';
            echo date('m-d-Y', strtotime('+30 days'));
            ?>
        </div>
    </div>
</div>

<?
    /*    <div class="super-container news-holder">
        <div class="container news-feed">
            <div class="two-thirds column alpha omega">
                <h1>news</h1>
                <hr>
                <? get_template_part('news-feed-new'); ?>
            </div>
            <div class="one-third column alpha omega">
                <h1>Events</h1>
                <hr>
                <? get_template_part('events-feed-new'); ?>
            </div>
        </div>
    </div>

    <div class="super-container news-button-holder">
        <div class="container news-buttons">
            <div class="two-thirds column alpha omega">
                <div class="button-holder">
                    <a href="<? bloginfo('url'); ?>/news" class="orng-btn">All News</a>
                </div>
            </div>
            <div class="one-third column alpha omega">
                <div class="button-holder">
                    <a href="<?php echo get_permalink(5441)?>" class="blue-btn">Events Calendar</a>
                </div>
                <br />
                <div class="button-holder">
                    <a href="http://calendar.highland.edu/mplusextranet/scp.dll/calendar?user=mPlusExtranetProxy,publiccalendar-finearts,publiccalendar-lifelong,publiccalendar-comrel,publiccalendar-athletics,%20PublicCalendar-Advising,publiccalendar-adulted,publiccalendar-studentevents,publiccalendar-studentservices,publiccalendar-confcenter,publiccalendar-presofc-board,publiccalendar-foundation&template=gwextra&lang=en-us&calendar=&html=&view=month&xsl=" class="blue-btn">Academic Calendar</a>
                </div>
            </div>
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
                        <img src="<? bloginfo('template_url'); ?>/images/book_store.png" />
                    </a><!--
				The comments eliminate unintentional white space created by browsers interpreting new lines as spaces
				--><a href="<? echo get_permalink(5353);?>" class="highlight-btn">
                        <img src="<? bloginfo('template_url'); ?>/images/library.png" />
                    </a><!--
				--><a href="<? echo get_permalink(429);?>" class="highlight-btn">
                        <img src="<? bloginfo('template_url'); ?>/images/athletics.png" />
                    </a><!--
				--><a href="<? echo get_permalink(444);?>" class="highlight-btn">
                        <img src="<? bloginfo('template_url'); ?>/images/fine_arts.png" />
                    </a><!--
				--><a href="<? echo get_permalink(5360);?>" class="highlight-btn">
                        <img src="<? bloginfo('template_url'); ?>/images/campus_life.png" />
                    </a>
                </div>
            </div>
        </div><!-- container -->
    </div><!-- super-container -->


    <div class="super-container events-holder">
        <div class="events-header">
            <p>Highland On Instagram</p>
        </div>
        <div class="container event-feed">
            <?

            //Access Token: 1643010779.1677ed0.23ef814506b740078b9b62d46dd86b53
            /*$access_token = "1643010779.1677ed0.23ef814506b740078b9b62d46dd86b53";
            $photo_count = 8;

            $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
            $json_link.="access_token={$access_token}&count={$photo_count}";
            $json = file_get_contents($json_link);
            $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
            //var_viewer($obj);
            foreach ($obj['data'] as $data) {
                echo '<div class="four columns alpha omega insta-single" style="padding: 1.041666666667%">';
                echo '<a href="'.$data['link'].'" target="_blank">';
                echo '<img src="'.$data['images']['standard_resolution']['url'].'" />';
                echo '</a>';
                echo '</div>';
                //var_viewer($data['images']['standard_resolution']['url']);
            }* /
            echo do_shortcode('[instagram-feed showheader=false showbutton=false showfollow=false]');
            ?>
            <div class="clear"></div>

            <div class="button-holder">
                <a href="https://www.instagram.com/highlandcollege/" class="blue-btn" target="_blank">Visit Us On Instagram</a>
            </div>
        </div>
    </div>
 */
?>

<?php
    /*/set'm up
    $image_1 = get_theme_mod( 'callout_pic_one' );
    $image_id = attachment_url_to_postid($image_1);
    $image_1_bg = wp_get_attachment_image_src($image_id, $size = 'small-thumb');
    $image_1_bg_url = $image_1_bg[0];
    $img_desc = get_post($image_id)->post_content;
    //spit'em out
    echo'<div class="container">';
        echo '<img src="'.$image_1_bg_url.'" alt="'.$img_desc.'" />';
        the_content();
    echo '</div>'; */
?>

<? get_footer(); ?>