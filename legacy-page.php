<?
    defined('ABSPATH') OR exit;
    /**
     * Template Name: Legacy Page
     * Description: Test new applications for the site.
     *
     * @package WordPress
     * @subpackage WP-Skeleton
     */

    get_header();
    get_template_part( 'sub-header-legacy', 'index' ); //the  header stuffs
    get_template_part( 'menu-legacy', 'index' ); //the  menu + logo/site title
?>

<main>
    <section id="hero">
        <div class="super-container"><?php
            $hero_image_data = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full');
            $hero_image_width = $hero_image_data[1];
            $hero_image_height = $hero_image_data[2];
            $hero_image = get_the_post_thumbnail_url(get_the_ID(),'full');
            $hero_image_mobile = get_the_post_thumbnail_url(get_the_ID(),'mobile-image');
            $hero_image_id = attachment_url_to_postid($hero_image);
            $hero_image_alt = get_post_meta($hero_image_id, '_wp_attachment_image_alt', true ); ?>
            <div class="hero-image">
                <picture>
                    <source type="image/webp" srcset="<? echo $hero_image_mobile; ?>.webp" type="image/webp" media="(max-width: 480px)">
                    <source type="image/png" srcset="<? echo $hero_image_mobile; ?>" type="image/jpeg" media="(max-width: 480px)">
                    <source type="image/webp" srcset="<? echo $hero_image; ?>.webp" type="image/webp">
                    <source type="image/png" srcset="<? echo $hero_image; ?>" type="image/jpeg">
                    <img src="<? echo $hero_image; ?>" alt="<? echo $hero_image_alt; ?>" aria-label="<? echo $hero_image_alt; ?>" width="<? echo $hero_image_width; ?>" height="<? echo $hero_image_height; ?>" />
                </picture>
            </div>
        </div>
    </section>

    <section id="legacy_content">
        <div class="super-container"><?
            $legacy_campaign_main_hdr_txt = get_theme_mod('legacy_campaign_main_hdr_txt');
            $legacy_campaign_main_btn_txt = get_theme_mod('legacy_campaign_main_btn_txt');
            $legacy_campaign_main_btn_link = get_theme_mod('legacy_campaign_main_btn_link'); ?>
            <div class="container">
                <div class="sixteen columns" id="content">
                    <div class="six columns support">
                        <h1><? echo $legacy_campaign_main_hdr_txt; ?></h1>
                        <a href="<? echo $legacy_campaign_main_btn_link; ?>" class="btn"><? echo $legacy_campaign_main_btn_txt; ?></a>
                    </div>
                    <div class="ten columns main">
                        <? the_post(); ?>
                        <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                            <div class="entry-content">
                                <? the_content(); ?>
                                <? edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-<? the_ID(); ?> -->
                    </div><!-- #main -->
                </div>
            </div>
        </div>
    </section>

    <section id="legacy_campaign">
        <div class="super-container"><?
            $legacy_campaign_image = get_theme_mod('legacy_campaign_image');
            $legacy_campaign_header = get_theme_mod('legacy_campaign_header');
            $legacy_campaign_text = get_theme_mod('legacy_campaign_text');
            $legacy_campaign_text = apply_filters('the_content', $legacy_campaign_text); ?>
            <div class="container">
                <div class="sixteen columns legacy-campaign">
                    <div class="eight columns legacy-campaign-img">
                        <img src="<? echo $legacy_campaign_image; ?>" alt="Highland College Foundation Campus Image."/>
                    </div>
                    <div class="ten columns legacy-campaign-text">
                        <h2><? echo $legacy_campaign_header; ?></h2>
                        <? echo $legacy_campaign_text; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="legacy_home">
        <div class="super-container"><?
            $legacy_slider_header_one = get_theme_mod('legacy_slider_header_one');
            $legacy_slider_image_one = get_theme_mod('legacy_slider_image_one');
            $legacy_slider_name_one = get_theme_mod('legacy_slider_name_one');
            $legacy_slider_text_one = get_theme_mod('legacy_slider_text_one');
            $legacy_slider_text_one = apply_filters('the_content', $legacy_slider_text_one);
            $legacy_slider_header_two = get_theme_mod('legacy_slider_header_two');
            $legacy_slider_image_two = get_theme_mod('legacy_slider_image_two');
            $legacy_slider_name_two = get_theme_mod('legacy_slider_name_two');
            $legacy_slider_text_two = get_theme_mod('legacy_slider_text_two');
            $legacy_slider_text_two = apply_filters('the_content', $legacy_slider_text_two);
            $legacy_slider_header_three = get_theme_mod('legacy_slider_header_three');
            $legacy_slider_image_three = get_theme_mod('legacy_slider_image_three');
            $legacy_slider_name_three = get_theme_mod('legacy_slider_name_three');
            $legacy_slider_text_three = get_theme_mod('legacy_slider_text_three');
            $legacy_slider_text_three = apply_filters('the_content', $legacy_slider_text_three);
            ?>
            <div class="container">
                <script type="text/javascript" src="<?php bloginfo('template_url');?>/includes/slick/slick.min.js" defer></script>
                <script type="text/javascript">
                    window.addEventListener('load',
                        function() {
                            jQuery(document).ready(function($) {
                                jQuery('.autoplay').slick({
                                    dots: true,
                                    infinite: true,
                                    speed: 500,
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    autoplay: true,
                                    autoplaySpeed: 4000,
                                    arrows: false,
                                });
                                jQuery('.slide-ctrl').on('click', function(){
                                    if(jQuery(this).hasClass('pause')) {
                                        jQuery(this).removeClass('pause').addClass('play');
                                        jQuery('.autoplay').slick('slickPlay');
                                        console.log('we removed pause to add play');
                                    } else if(jQuery(this).hasClass('play')) {
                                        jQuery(this).removeClass('play').addClass('pause');
                                        jQuery('.autoplay').slick('slickPause');
                                        console.log('we removed play to add pause');
                                    } else {
                                        //do nothing
                                    }
                                });
                            });
                        }, false);
                </script>
                <div class="slider autoplay">
                    <div class="sixteen columns">
                        <h2>"<? echo $legacy_slider_header_one; ?>"</h2>
                        <div class="literal one-third column slide-details">
                            <img src="<? echo $legacy_slider_image_one; ?>" alt="Highland College Foundation Campus Image."/>
                            <h3><? echo $legacy_slider_name_one; ?></h3>
                            <div class="slide-ctrl play">
                                <!--<div class="bckgrnd"></div>-->
                                <div class="icon" width="120" height="120">
                                    <div class="side left" x="0" y="0" width="120" height="120" fill="#fff"></div>
                                    <div class="side right" x="0" y="0" width="120" height="120" fill="#fff"></div>
                                </div>
                            </div>
                        </div>
                        <div class="literal two-thirds column slide-txt">
                            <p><? echo $legacy_slider_text_one; ?></p>
                        </div>
                    </div>
                    <div class="sixteen columns">
                        <h2>"<? echo $legacy_slider_header_two; ?>"</h2>
                        <div class="literal one-third column slide-details">
                            <img src="<? echo $legacy_slider_image_two; ?>" alt="Highland College Foundation Campus Image."/>
                            <h3><? echo $legacy_slider_name_two; ?></h3>
                            <div class="slide-ctrl play">
                                <!--<div class="bckgrnd"></div>-->
                                <div class="icon" width="120" height="120">
                                    <div class="side left" x="0" y="0" width="120" height="120" fill="#fff"></div>
                                    <div class="side right" x="0" y="0" width="120" height="120" fill="#fff"></div>
                                </div>
                            </div>
                        </div>
                        <div class="literal two-thirds column slide-txt">
                            <p><? echo $legacy_slider_text_two; ?></p>
                        </div>
                    </div>
                    <div class="sixteen columns">
                        <h2>"<? echo $legacy_slider_header_three; ?>"</h2>
                        <div class="literal one-third column slide-details">
                            <img src="<? echo $legacy_slider_image_three; ?>" alt="Highland College Foundation Campus Image."/>
                            <h3><? echo $legacy_slider_name_three; ?></h3>
                            <div class="slide-ctrl play">
                                <!--<div class="bckgrnd"></div>-->
                                <div class="icon" width="120" height="120">
                                    <div class="side left" x="0" y="0" width="120" height="120" fill="#fff"></div>
                                    <div class="side right" x="0" y="0" width="120" height="120" fill="#fff"></div>
                                </div>
                            </div>
                        </div>
                        <div class="literal two-thirds column slide-txt">
                            <p><? echo $legacy_slider_text_three; ?></p>
                        </div>
                    </div>
                </div>
                <style>
                    .slide-ctrl {
                        align-items: center;
                        display: flex;
                        justify-content: center;
                    }
                    .bckgrnd {
                        background: #ff6200;
                        border-radius: 50%;
                        box-shadow: 0 1px 2.2px rgba(0, 0, 0, 0.051),
                        0 2.3px 5.3px rgba(0, 0, 0, 0.059), 0 4.4px 10px rgba(0, 0, 0, 0.06),
                        0 7.8px 17.9px rgba(0, 0, 0, 0.059), 0 14.6px 33.4px rgba(0, 0, 0, 0.059),
                        0 35px 80px rgba(0, 0, 0, 0.07);
                        cursor: pointer;
                        height: 100px;
                        position: absolute;
                        width: 100px;
                    }

                    .icon {
                        height: 120px;
                        transform: rotate(-120deg);
                        transition: transform 500ms;
                        width: 120px;
                        margin-top: -30px;
                    }
                    .side {
                        background: white;
                        height: 120px;
                        position: absolute;
                        width: 120px;
                    }
                    .left {
                        clip-path: polygon(
                                43.77666% 55.85251%,
                                43.77874% 55.46331%,
                                43.7795% 55.09177%,
                                43.77934% 54.74844%,
                                43.77855% 54.44389%,
                                43.77741% 54.18863%,
                                43.77625% 53.99325%,
                                43.77533% 53.86828%,
                                43.77495% 53.82429%,
                                43.77518% 53.55329%,
                                43.7754% 53.2823%,
                                43.77563% 53.01131%,
                                43.77585% 52.74031%,
                                43.77608% 52.46932%,
                                43.7763% 52.19832%,
                                43.77653% 51.92733%,
                                43.77675% 51.65633%,
                                43.77653% 51.38533%,
                                43.7763% 51.11434%,
                                43.77608% 50.84334%,
                                43.77585% 50.57235%,
                                43.77563% 50.30136%,
                                43.7754% 50.03036%,
                                43.77518% 49.75936%,
                                43.77495% 49.48837%,
                                44.48391% 49.4885%,
                                45.19287% 49.48865%,
                                45.90183% 49.48878%,
                                46.61079% 49.48892%,
                                47.31975% 49.48906%,
                                48.0287% 49.4892%,
                                48.73766% 49.48934%,
                                49.44662% 49.48948%,
                                50.72252% 49.48934%,
                                51.99842% 49.4892%,
                                53.27432% 49.48906%,
                                54.55022% 49.48892%,
                                55.82611% 49.48878%,
                                57.10201% 49.48865%,
                                58.3779% 49.4885%,
                                59.6538% 49.48837%,
                                59.57598% 49.89151%,
                                59.31883% 50.28598%,
                                58.84686% 50.70884%,
                                58.12456% 51.19714%,
                                57.11643% 51.78793%,
                                55.78697% 52.51828%,
                                54.10066% 53.42522%,
                                52.02202% 54.54581%,
                                49.96525% 55.66916%,
                                48.3319% 56.57212%,
                                47.06745% 57.27347%,
                                46.11739% 57.79191%,
                                45.42719% 58.14619%,
                                44.94235% 58.35507%,
                                44.60834% 58.43725%,
                                44.37066% 58.41149%,
                                44.15383% 58.27711%,
                                43.99617% 58.0603%,
                                43.88847% 57.77578%,
                                43.82151% 57.43825%,
                                43.78608% 57.06245%,
                                43.77304% 56.66309%,
                                43.773% 56.25486%
                        );
                        transition: clip-path 500ms;
                    }
                    .right {
                        clip-path: polygon(
                                43.77666% 43.83035%,
                                43.77874% 44.21955%,
                                43.7795% 44.59109%,
                                43.77934% 44.93442%,
                                43.77855% 45.23898%,
                                43.77741% 45.49423%,
                                43.77625% 45.68961%,
                                43.77533% 45.81458%,
                                43.77495% 45.85858%,
                                43.77518% 46.12957%,
                                43.7754% 46.40056%,
                                43.77563% 46.67156%,
                                43.77585% 46.94255%,
                                43.77608% 47.21355%,
                                43.7763% 47.48454%,
                                43.77653% 47.75554%,
                                43.77675% 48.02654%,
                                43.77653% 48.29753%,
                                43.7763% 48.56852%,
                                43.77608% 48.83952%,
                                43.77585% 49.11051%,
                                43.77563% 49.38151%,
                                43.7754% 49.65251%,
                                43.77518% 49.9235%,
                                43.77495% 50.1945%,
                                44.48391% 50.19436%,
                                45.19287% 50.19422%,
                                45.90183% 50.19408%,
                                46.61079% 50.19394%,
                                47.31975% 50.1938%,
                                48.0287% 50.19366%,
                                48.73766% 50.19353%,
                                49.44662% 50.19338%,
                                50.72252% 50.19353%,
                                51.99842% 50.19366%,
                                53.27432% 50.1938%,
                                54.55022% 50.19394%,
                                55.82611% 50.19408%,
                                57.10201% 50.19422%,
                                58.3779% 50.19436%,
                                59.6538% 50.1945%,
                                59.57598% 49.79136%,
                                59.31883% 49.39688%,
                                58.84686% 48.97402%,
                                58.12456% 48.48572%,
                                57.11643% 47.89493%,
                                55.78697% 47.16458%,
                                54.10066% 46.25764%,
                                52.02202% 45.13705%,
                                49.96525% 44.01371%,
                                48.3319% 43.11074%,
                                47.06745% 42.4094%,
                                46.11739% 41.89096%,
                                45.42719% 41.53667%,
                                44.94235% 41.3278%,
                                44.60834% 41.24561%,
                                44.37066% 41.27137%,
                                44.15383% 41.40575%,
                                43.99617% 41.62256%,
                                43.88847% 41.90709%,
                                43.82151% 42.24461%,
                                43.78608% 42.62041%,
                                43.77304% 43.01978%,
                                43.773% 43.428%
                        );
                        transition: clip-path 500ms;
                    }
                    .play .icon {
                        transform: rotate(-90deg);
                    }
                    .play .left {
                        clip-path: polygon(
                                56.42249% 57.01763%,
                                54.93283% 57.0175%,
                                53.00511% 57.01738%,
                                50.83554% 57.01727%,
                                48.62036% 57.01718%,
                                46.55585% 57.01709%,
                                44.83822% 57.01702%,
                                43.66373% 57.01698%,
                                43.22863% 57.01696%,
                                42.86372% 57.01904%,
                                42.56988% 57.01621%,
                                42.3402% 56.99486%,
                                42.16778% 56.94152%,
                                42.0457% 56.84267%,
                                41.96705% 56.68478%,
                                41.92493% 56.45432%,
                                41.91246% 56.13777%,
                                41.91258% 55.76282%,
                                41.9129% 55.37058%,
                                41.91335% 54.96757%,
                                41.91387% 54.56032%,
                                41.91439% 54.15537%,
                                41.91485% 53.75926%,
                                41.91517% 53.3785%,
                                41.91529% 53.01965%,
                                41.94275% 52.72355%,
                                42.02117% 52.51653%,
                                42.14465% 52.38328%,
                                42.30727% 52.30854%,
                                42.50308% 52.27699%,
                                42.72619% 52.27341%,
                                42.97065% 52.28248%,
                                43.23056% 52.2889%,
                                43.94949% 52.28896%,
                                45.45083% 52.28912%,
                                47.47445% 52.28932%,
                                49.76027% 52.28957%,
                                52.04818% 52.28981%,
                                54.07805% 52.29003%,
                                55.5898% 52.29019%,
                                56.32332% 52.29024%,
                                56.58221% 52.28816%,
                                56.83726% 52.28948%,
                                57.07897% 52.30593%,
                                57.29794% 52.34898%,
                                57.48468% 52.43029%,
                                57.62978% 52.56146%,
                                57.72375% 52.7541%,
                                57.75718% 53.01981%,
                                57.75713% 53.37763%,
                                57.75699% 53.81831%,
                                57.75679% 54.31106%,
                                57.75657% 54.82507%,
                                57.75635% 55.32958%,
                                57.75615% 55.79377%,
                                57.75601% 56.18684%,
                                57.75596% 56.47801%,
                                57.7549% 56.50122%,
                                57.74034% 56.5624%,
                                57.6955% 56.64887%,
                                57.60334% 56.748%,
                                57.44691% 56.84712%,
                                57.20925% 56.93358%,
                                56.87342% 56.99471%
                        );
                    }
                    .play .right {
                        clip-path: polygon(
                                56.42249% 42.44625%,
                                54.93283% 42.44637%,
                                53.00511% 42.44649%,
                                50.83554% 42.4466%,
                                48.62036% 42.4467%,
                                46.55585% 42.44679%,
                                44.83822% 42.44685%,
                                43.66373% 42.4469%,
                                43.22863% 42.44691%,
                                42.86372% 42.44483%,
                                42.56988% 42.44767%,
                                42.3402% 42.46902%,
                                42.16778% 42.52235%,
                                42.0457% 42.6212%,
                                41.96705% 42.77909%,
                                41.92493% 43.00956%,
                                41.91246% 43.32611%,
                                41.91258% 43.70105%,
                                41.9129% 44.0933%,
                                41.91335% 44.49631%,
                                41.91387% 44.90355%,
                                41.91439% 45.3085%,
                                41.91485% 45.70462%,
                                41.91517% 46.08537%,
                                41.91529% 46.44422%,
                                41.94275% 46.74032%,
                                42.02117% 46.94735%,
                                42.14465% 47.0806%,
                                42.30727% 47.15534%,
                                42.50308% 47.18688%,
                                42.72619% 47.19047%,
                                42.97065% 47.1814%,
                                43.23056% 47.17497%,
                                43.94949% 47.17491%,
                                45.45083% 47.17476%,
                                47.47445% 47.17455%,
                                49.76027% 47.1743%,
                                52.04818% 47.17406%,
                                54.07805% 47.17384%,
                                55.5898% 47.17369%,
                                56.32332% 47.17363%,
                                56.58221% 47.17571%,
                                56.83726% 47.17439%,
                                57.07897% 47.15795%,
                                57.29794% 47.1149%,
                                57.48468% 47.03359%,
                                57.62978% 46.90242%,
                                57.72375% 46.70977%,
                                57.75718% 46.44406%,
                                57.75713% 46.08625%,
                                57.75699% 45.64557%,
                                57.75679% 45.15282%,
                                57.75657% 44.6388%,
                                57.75635% 44.1343%,
                                57.75615% 43.6701%,
                                57.75601% 43.27703%,
                                57.75596% 42.98586%,
                                57.7549% 42.96265%,
                                57.74034% 42.90148%,
                                57.6955% 42.815%,
                                57.60334% 42.71587%,
                                57.44691% 42.61675%,
                                57.20925% 42.53029%,
                                56.87342% 42.46916%
                        );
                    }
                </style>
            </div>
        </div>
    </section>

    <section id="legacy_higher">
        <div class="super-container">
            <div class="container">
                <div class="higher top"><?
                    $legacy_higher_header = get_theme_mod('legacy_higher_header');
                    $legacy_higher_text = get_theme_mod('legacy_higher_text');
                    $legacy_higher_text = apply_filters('the_content', $legacy_higher_text);
                    $legacy_higher_link = get_theme_mod('legacy_higher_link');
                    $legacy_higher_link_text = get_theme_mod('legacy_higher_link_text');
                    ?>
                    <div class="eight columns">
                        <h2><? echo $legacy_higher_header; ?></h2>
                        <p><? echo $legacy_higher_text; ?></p>
                        <a href="<? echo $legacy_higher_link; ?>" class="btn"><? echo $legacy_higher_link_text; ?></a>
                    </div>
                </div>
                <img src="<? bloginfo('template_url'); ?>/images/support_img_highlight.png" alt="Highland College Foundation Campus Image." class="middle"/>
                <img src="<? bloginfo('template_url'); ?>/images/support_bg.jpg" alt="Highland College Foundation Campus Image." class="bottom"/>
            </div>
        </div>
    </section>

    <section id="callouts">
        <div class="super-container">
            <div class="container"><?
                $legacy_callout_icon_one = get_theme_mod('legacy_callout_icon_one');
                $legacy_callout_header_one = get_theme_mod('legacy_callout_header_one');
                $legacy_callout_text_one = get_theme_mod('legacy_callout_text_one');
                $legacy_callout_text_one = apply_filters('the_content', $legacy_callout_text_one);
                $legacy_callout_icon_two = get_theme_mod('legacy_callout_icon_two');
                $legacy_callout_header_two = get_theme_mod('legacy_callout_header_two');
                $legacy_callout_text_two = get_theme_mod('legacy_callout_text_two');
                $legacy_callout_text_two = apply_filters('the_content', $legacy_callout_text_two);
                ?>
                <div class="sixteen columns callouts">
                    <div class="eight columns first callout">
                        <h2><img src="<? echo $legacy_callout_icon_one; ?>" alt="Highland College Foundation Campus Image."/><? echo $legacy_callout_header_one; ?></h2>
                        <p><? echo $legacy_callout_text_one; ?></p>
                    </div>
                    <div class="eight columns second callout">
                        <h2><img src="<? echo $legacy_callout_icon_two; ?>" alt="Highland College Foundation Campus Image."/><? echo $legacy_callout_header_two; ?></h2>
                        <p><? echo $legacy_callout_text_two; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials">
        <div class="super-container">
            <div class="container"><?
                $legacy_test_img_one = get_theme_mod('legacy_test_img_one');
                $legacy_test_text_one = get_theme_mod('legacy_test_text_one');
                $legacy_test_text_one = apply_filters('the_content', $legacy_test_text_one);
                $legacy_test_name_one = get_theme_mod('legacy_test_name_one');
                $legacy_test_title_one = get_theme_mod('legacy_test_title_one');
                $legacy_test_img_two = get_theme_mod('legacy_test_img_two');
                $legacy_test_text_two = get_theme_mod('legacy_test_text_two');
                $legacy_test_text_two = apply_filters('the_content', $legacy_test_text_two);
                $legacy_test_name_two = get_theme_mod('legacy_test_name_two');
                $legacy_test_title_two = get_theme_mod('legacy_test_title_two');
                $legacy_test_img_three = get_theme_mod('legacy_test_img_three');
                $legacy_test_text_three = get_theme_mod('legacy_test_text_three');
                $legacy_test_text_three = apply_filters('the_content', $legacy_test_text_three);
                $legacy_test_name_three = get_theme_mod('legacy_test_name_three');
                $legacy_test_title_three = get_theme_mod('legacy_test_title_three');
                ?>
                <div class="sixteen columns">
                    <div class="literal one-third column testimonial">
                        <img src="<? echo $legacy_test_img_one; ?>" alt="Highland College Foundation Campus Image."/>
                        <p><? echo $legacy_test_text_one; ?></p>
                        <p class="name"><? echo $legacy_test_name_one; ?></p>
                        <p><? echo $legacy_test_title_one; ?></p>
                    </div>
                    <div class="literal one-third column testimonial">
                        <img src="<? echo $legacy_test_img_two; ?>" alt="Highland College Foundation Campus Image."/>
                        <p><? echo $legacy_test_text_two; ?></p>
                        <p class="name"><? echo $legacy_test_name_two; ?></p>
                        <p><? echo $legacy_test_title_two; ?></p>
                    </div>
                    <div class="literal one-third column testimonial">
                        <img src="<? echo $legacy_test_img_three; ?>" alt="Highland College Foundation Campus Image."/>
                        <p><? echo $legacy_test_text_three; ?></p>
                        <p class="name"><? echo $legacy_test_name_three; ?></p>
                        <p><? echo $legacy_test_title_three; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="community">
        <div class="super-container">
            <div class="container"><?
                $legacy_comm_header = get_theme_mod('legacy_comm_header');
                $legacy_comm_text = get_theme_mod('legacy_comm_text');
                $legacy_comm_text = apply_filters('the_content', $legacy_comm_text);
                $legacy_comm_link = get_theme_mod('legacy_comm_link');
                $legacy_comm_link_text = get_theme_mod('legacy_comm_link_text');
                ?>
                <div class="sixteen columns">
                    <hr>
                    <h2><? echo $legacy_comm_header; ?></h2>
                    <p><? echo $legacy_comm_text; ?></p>
                    <a href="<? echo $legacy_comm_link; ?>"><? echo $legacy_comm_link_text; ?></a>
                </div>
            </div>
        </div>
    </section>

</main>

<? get_footer('legacy'); ?>