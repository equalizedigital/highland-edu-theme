<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>


<!DOCTYPE html>
<html <? language_attributes(); ?>>

<head>
    <meta charset="<? bloginfo( 'charset' ); ?>" />

    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if gte IE 9 ]><html class="no-js ie9" lang="en"> <![endif]-->

    <title><? wp_title('|',true,'right'); ?></title>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <!--<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/stylesheets/base.css">
	<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/stylesheets/base-two.css">
    <link rel="stylesheet" href= "<? echo get_template_directory_uri(); ?>/style.css">
    <link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/stylesheets/layout.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/includes/slick/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/includes/slick/slick-theme.css">
	<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/stylesheets/combined.css">-->
	<link rel="stylesheet" href="<? echo get_template_directory_uri(); ?>/stylesheets/combined.css?v=<? echo filemtime( get_stylesheet_directory().'/stylesheets/combined.css'); ?>">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="<? echo get_template_directory_uri(); ?>/images/favicon.ico">
    <link rel="apple-touch-icon" href="<? echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<? echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<? echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114.png">

    <!-- Fonts
    ================================================== -->
    <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,800|Roboto:100,300,400,500,700,900" rel="stylesheet">-->

	<!-- Login/Logout Hider -->
	<?
		if (isset($_SESSION['Login_Status'])){ ?>
			<style>
				.login { display: none !important; }
				.logout { display: table-cell !important; }
			</style><?
			if ($_SESSION['Login_Status'] == "staff"){ ?>
				<style>
					.staff-portal { display: table-cell !important; }
					.student-portal { display: none !important; }
				</style><?
			}
			if ($_SESSION['Login_Status'] == "student"){ ?>
				<style>
					.staff-portal { display: none !important; }
					.student-portal { display: table-cell !important; }
				</style><?
			}
		} else { ?>
			<style>
				.login { display: table-cell !important; }
				.logout { display: none !important; }
				.staff-portal { display: none !important; }
				.student-portal { display: none !important; }
			</style><?
		}
	?>

	<script>
		!function(e){"use strict"
			var n=function(n,t,o){function i(e){return f.body?e():void setTimeout(function(){i(e)})}var d,r,a,l,f=e.document,s=f.createElement("link"),u=o||"all"
				return t?d=t:(r=(f.body||f.getElementsByTagName("head")[0]).childNodes,d=r[r.length-1]),a=f.styleSheets,s.rel="stylesheet",s.href=n,s.media="only x",i(function(){d.parentNode.insertBefore(s,t?d:d.nextSibling)}),l=function(e){for(var n=s.href,t=a.length;t--;)if(a[t].href===n)return e()
					setTimeout(function(){l(e)})},s.addEventListener&&s.addEventListener("load",function(){this.media=u}),s.onloadcssdefined=l,l(function(){s.media!==u&&(s.media=u)}),s}
			"undefined"!=typeof exports?exports.loadCSS=n:e.loadCSS=n}("undefined"!=typeof global?global:this)
	</script>
	<style>
		/*.social-butterfly,.home-page,.parallax-area,.callout-holder,.events-holder,.footer-wrapper{display:none;}
		.logo{position:absolute !important;top:0;left:0;padding-left:100px;z-index:2010;}
		.logo a{text-decoration:none;}
		.menu-holder{min-height:164px;}
		.search-icon{float:right;}
		.title-holder{background-image:url(../images/header_bg.jpg);max-height:260px;text-align:center;padding:80px 0;}
		.title-holder h1{color:#FFF;text-transform:uppercase;}
		.top-menu-holder{background:#8b8989;margin:25px 0;}
		.menu-dark{background:#787474;}
		.menu-orng{background:#fd6c35;}
		.top-nav-holder{z-index:2005;}
		ul#menu-topnav{float:right;margin-bottom:0;margin-left:0;}
		ul#menu-topnav li{display:table-cell;padding:0 10px;border-left:2px #8b8989 solid;margin-bottom:0;}
		ul#menu-topnav li li{display:inline-block;}
		ul#menu-topnav li a{font-family:'Raleway', sans-serif;font-size:18px;line-height:55px;letter-spacing:.25px;font-weight:500;text-transform:uppercase;color:#FFF;text-decoration:none;cursor:pointer;display:block;}
		ul#menu-topnav li ul li a{color:#fff;}
		ul#menu-topnav li a:hover{color:#aaa;}
		ul#menu-topnav ul.sub-menu{box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);-moz-box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);-webkit-box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);display:none;position:absolute;width:170px;z-index:99999;margin:0 0;padding:0 0;text-align:left;background:#777;}
		ul#menu-topnav ul.sub-menu li{min-width:170px;margin:0 0;border-bottom:#666 solid 1px;border-left:#666 solid 1px !important;border-right:#999 solid 1px !important;padding:0;background:#777;}
		ul#menu-topnav ul.sub-menu li:first-child{border-top:#666 solid 1px !important;}
		ul#menu-topnav ul ul{left:100%;top:0;}
		ul#menu-topnav ul a{font-style:italic;font-weight:700;line-height:1em;padding:10px;width:150px;height:auto;font-size:12px;display:block;}
		ul#menu-topnav ul:hover > a{color:#FFF;background:#8b8989;}
		ul#menu-topnav li:hover > ul{display:block;}
		ul#menu-topnav li:hover > a{color:#FFF;}
		.slicknav_menu{display:none;}
		.menu-wrapper{background:#ddd;}
		.portal-menu-holder{background:#fd6c35;margin-bottom:50px;}
		.primary-nav-holder{z-index:2000;}
		#access, #more_access{position:relative;padding:0;text-align:center;}
		#access{z-index:2000;}
		#more_access{z-index:1900;}
		#access li, #more_access li{margin:0;padding:0;}
		#access ul, #more_access ul{list-style:none;text-align:right;margin:0;padding:0;}
		#access .menu-header,
		#more_access .menu-header,
		div.menu{font-size:13px;}
		#access .menu-header ul,
		#more_access .menu-header ul,
		div.menu ul{list-style:none;margin:0;}
		#access .menu-header li,
		#more_access .menu-header li,
		div.menu li{margin:0 0;}
		#access a, #more_access a{position:relative;font-family:'Raleway', sans-serif;font-size:18px;line-height:55px;letter-spacing:.5px;font-weight:500;text-decoration:none;text-transform:uppercase;display:block;color:#787474;margin:0;}
		#more_access a{color:#FFF;}
		#menu-main-menu, #menu-resource-menu{text-align:center;}
		#menu-main-menu li, #menu-resource-menu li{display:inline-block;position:relative;padding:0 1%;}
		<!--[if IE 8]>
		             #menu-main-menu li, , #menu-resource-menu li{float:left;}
		#access ul ul, #more_access ul ul{box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);-moz-box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);-webkit-box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);display:none;position:absolute;width:180px;z-index:2000;margin:0 0;padding:0 0;text-align:left;}
		#access ul ul li, #more_access ul ul li{min-width:180px;margin:0 0;border-bottom:#666 solid 1px;border-left:#666 solid 1px !important;padding:0;}
		#access ul ul ul, #more_access ul ul ul{left:100%;top:0;}
		#access ul ul a, #more_access ul ul a{background:#777;line-height:1em;padding:10px;width:160px;height:auto;font-size:14px;color:#fff;}
		#access li:hover{background-color:#666;}
		#access li:hover > a{color:#fff;}
		#more_access li:hover{background-color:#f50;color:#fff;}
		#access ul ul:hover > a,
		#more_access ul ul:hover > a{background-color:#666;}
		#access ul li:hover > ul,
		#more_access ul li:hover > ul{display:block;}
		* html #access ul li.current_page_item a,
		* html #access ul li.current-menu-ancestor a,
		* html #access ul li.current-menu-item a,
		* html #access ul li.current-menu-parent a,
		* html #access ul li a:hover,
		* html #more_access ul li.current_page_item a,
		* html #more_access ul li.current-menu-ancestor a,
		* html #more_access ul li.current-menu-item a,
		* html #more_access ul li.current-menu-parent a,
		* html #more_access ul li a:hover{color:#FFF;}
		.menu-wrapper{background:#ddd;}
		.primary-nav-holder{z-index:2000;}
		#side_access{position:relative;padding:0;z-index:2000;text-align:center;background:#285598;overflow:auto;}
		#side_access li{margin:0;padding:0;}
		#side_access ul{list-style:none;text-align:right;margin:0;padding:0;}
		#side_access .menu-header,
		div.menu{font-size:13px;}
		#side_access .menu-header ul,
		div.menu ul{list-style:none;margin:0;}
		#side_access .menu-header li,
		div.menu li{margin:0 0;}
		#side_access a{position:relative;font-family:'Raleway', sans-serif;font-size:18px;line-height:55px;letter-spacing:.5px;font-weight:500;text-decoration:none;text-transform:uppercase;display:block;color:#FFF;margin:0;padding-left:5%;text-align:left;}
		#side_access ul ul{box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);-moz-box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);-webkit-box-shadow:0px 3px 3px rgba(0, 0, 0, 0.2);display:none;position:absolute;width:180px;z-index:2000;margin:0 0;padding:0 0;text-align:left;}
		#side_access ul ul li{min-width:180px;margin:0 0;border-bottom:#666 solid 1px;border-left:#666 solid 1px !important;padding:0;}
		#side_access ul ul ul{left:100%;top:0;}
		#side_access ul ul a{background:#777;line-height:1em;padding:10px;width:160px;height:auto;font-size:14px;color:#fff;}
		#side_access li:hover > a{background-color:#1a3763;color:#fff;}
		#side_access ul ul:hover > a{background-color:#666;}
		#side_access ul li:hover > ul{display:block;}
		* html #side_access ul li.current_page_item a,
		* html #side_access ul li.current-menu-ancestor a,
		* html #side_access ul li.current-menu-item a,
		* html #side_access ul li.current-menu-parent a,
		* html #side_access ul li a:hover{color:#FFF;}
		.ss-overlay{position:absolute;top:15%;left:10%;width:40%;}
		.slideshow-overlay{position:absolute !important;bottom:0;left:0;text-align:center;z-index:11;background-color:rgb(137, 134, 134);background-color:rgba(137, 134, 134, 0.5);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#898686, endColorstr=#898686);-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#898686, endColorstr=#898686)";padding:40px 0;}
		.slideshow-overlay a{font-family:'Raleway', sans-serif;font-size:24px;line-height:60px;letter-spacing:-.15px;font-weight:800;text-transform:uppercase;text-decoration:none;color:#FFF;padding:10px 40px;border-radius:25px;}
		.slide-link{width:33.3333333%;float:left;}
		a.apply{background:#fd6c35;}
		a.plan{background:#285598;}
		a.request{background:#193662;}
		.news-holder{padding:25px 0 !important;display:block;}
		.news-feed h1{line-height:36px;color:#8b8989;text-transform:uppercase;text-align:center;padding:50px 0;}
		.teaser-item{background:no-repeat;background-position:100%;position:relative;float:left;width:31.333%;cursor:pointer !important;min-height:300px;box-sizing:border-box;margin:1%}
		.teaser-item.ti-1, .teaser-item.ti-4{width:64.666%;}
		.teaser-item.ti-1 .teaser-holder, .teaser-item.ti-4 .teaser-holder{width:50%;}
		.teaser-holder{padding:20px;min-height:300px;color:#FFF;}
		.teaser-item.ti-1 .teaser-holder, .teaser-item.ti-5 .teaser-holder{background:#285598;}
		.teaser-item.ti-4 .teaser-holder, .teaser-item.ti-8 .teaser-holder{background:#797574;}
		.teaser-item.ti-3, .teaser-item.ti-7{background:#1a3763;}
		.teaser-item.ti-2, .teaser-item.ti-6{background:#fd6c35;}
		.arrow{position:absolute;z-index:9999;top:8%;right:39%;width:0;height:0;border-bottom:50px solid transparent;border-left:60px solid #2b5598;border-top:50px solid transparent;transition:.5s;}
		.teaser-item.ti-1 .arrow{border-left:60px solid #2b5598;}
		.teaser-item.ti-4 .arrow{border-left:60px solid #797574;}
		.teaser-item.ti-3 .arrow, .teaser-item.ti-2 .arrow{display:none;}
		#slides{text-align:center;}
		#slides{display:none;}*/
	</style>
	<script>
		//loadCSS("<?php echo get_template_directory_uri(); ?>/stylesheets/combined.css");
		loadCSS("https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,800|Roboto:100,300,400,500,700,900");
		loadCSS("<?php echo get_template_directory_uri(); ?>/includes/slick/slick.css");
		loadCSS("<?php echo get_template_directory_uri(); ?>/includes/slick/slick-theme.css");
	</script>

    <?php wp_head();

    $sitewide_header_scripts = get_theme_mod( 'sitewide_tracking_header_code');
    if(isset($post->ID)) {
        $hdr_tracking_code = get_post_meta($post->ID, '_cmb_hdr_tracking_code', true);
    }
    if(!empty($sitewide_header_scripts)){
        echo $sitewide_header_scripts;
    }
    if(!empty($hdr_tracking_code)){
        echo $hdr_tracking_code;
    }
    ?>
</head>

<body <? body_class(); ?>><!-- the Body  -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K89RK5B"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Reachcode Tracking Script -->
    <script type="text/javascript" src="//cdn.rlets.com/capture_configs/15a/ab4/91e/6724d2ea6f70c9244e86166.js" async="async"></script>
<!-- End Reachcode Tracking Script -->