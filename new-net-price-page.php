<?
defined('ABSPATH') OR exit;
/**
 * Template Name: New Net Price Page
 * Description: A full-width template with no sidebar
 *
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>
<main id="main-content">

    <div class="super-container interior-page">
        <div class="container">
                <div id="primary" class="full-width">
                    <div id="content">
                        <? the_post(); ?>
                        <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                            <header class="entry-header">
                                <h1 class="entry-title"><? the_title(); ?></h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <? the_content(); ?>

                                <iframe src="https://highland.edu/wp-content/themes/highland_edu/npc.html" style="width: 100%; height: 1300px;"></iframe>
                            </div><!-- .entry-content -->
                        </article><!-- #post-<? the_ID(); ?> -->
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>

    <script type='text/javascript'>function SetupConstants() {HideTag('s_ls_0');
            numberoflivingstatus = 2;
        }; SetupConstants(); var showWelcomeMessage = true; openInstitutionNameWindow();
    </script>
</main>
<? get_footer(); ?>