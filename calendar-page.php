<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Calendar Page
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

    <div class="super-container calendar-page" id="calendar_page">
        <div class="container">
            <div class="sixteen columns alpha">
                <div id="primary" class="full-width">
                    <div id="content">
                        <? the_post(); ?>
                        <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                            <header class="entry-header">
                                <h1 class="entry-title"><? the_title(); ?></h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <? the_content(); ?>
                                <? edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-<? the_ID(); ?> -->
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>

<? get_footer(); ?>