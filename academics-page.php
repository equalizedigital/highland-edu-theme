<?
defined('ABSPATH') OR exit;
/**
 * Template Name: Academics Page
 * Description: List of Departments with a link to individual tax page with list of related classes.
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
                        <div class="two-thirds column alpha">
                            <div class="main">
                                <? the_post(); ?>
                                <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                                    <div class="entry-content">
                                        <header>
                                            <h1 class="super-h1">Academic Programs</h1>
                                        </header>
                                        <div class="sixteen columns alpha omega academics">
                                            <div class="search-list-holder">
                                                <ul class="search-list">
                                                    <li><a class="search-list-item" href="#A">A</a></li>
                                                    <li><a class="search-list-item" href="#B">B</a></li>
                                                    <li><a class="search-list-item" href="#C">C</a></li>
                                                    <li><a class="search-list-item" href="#D">D</a></li>
                                                    <li><a class="search-list-item" href="#E">E</a></li>
                                                    <li><a class="search-list-item" href="#F">F</a></li>
                                                    <li><a class="search-list-item" href="#G">G</a></li>
                                                    <li><a class="search-list-item" href="#H">H</a></li>
                                                    <li><a class="search-list-item" href="#I">I</a></li>
                                                    <li><a class="search-list-item" href="#J">J</a></li>
                                                    <li><a class="search-list-item" href="#K">K</a></li>
                                                    <li><a class="search-list-item" href="#L">L</a></li>
                                                    <li><a class="search-list-item" href="#M">M</a></li>
                                                    <li><a class="search-list-item" href="#N">N</a></li>
                                                    <li><a class="search-list-item" href="#O">O</a></li>
                                                    <li><a class="search-list-item" href="#P">P</a></li>
                                                    <li><a class="search-list-item" href="#Q">Q</a></li>
                                                    <li><a class="search-list-item" href="#R">R</a></li>
                                                    <li><a class="search-list-item" href="#S">S</a></li>
                                                    <li><a class="search-list-item" href="#T">T</a></li>
                                                    <li><a class="search-list-item" href="#U">U</a></li>
                                                    <li><a class="search-list-item" href="#V">V</a></li>
                                                    <li><a class="search-list-item" href="#W">W</a></li>
                                                    <li><a class="search-list-item" href="#X">X</a></li>
                                                    <li><a class="search-list-item" href="#Y">Y</a></li>
                                                    <li><a class="search-list-item" href="#Z">Z</a></li>
                                                </ul>
                                            </div>
                                            <?
                                                $srch_ltr = "Z";
                                                $args = array( 'hide_empty' => false );
                                                $depts = get_terms('department', $args);
                                                echo '<div class="program-search left">';
                                                foreach($depts as $dept){
                                                    $display = '';
                                                    $display = get_term_meta($dept->term_id, 'mstar_term_display', true);
                                                    //var_viewer($display);
                                                    if($display != "on"){continue;}
                                                    $dept_name = $dept->name;
                                                    $dept_slug = $dept->slug;
                                                    $dept_tax  = $dept->taxonomy;
                                                    $str = strtoupper(substr($dept_name, 0, 1));
                                                    //var_viewer($str);
                                                    if($srch_ltr != $str){
                                                        if($str == "I"){
                                                            echo '</ul>';
                                                            echo '</div>';
                                                            echo '<div class="program-search right">';
                                                            echo '<ul id="'.$str.'" class="program-item">';
                                                        } else {
                                                            echo '</ul><ul id="'.$str.'" class="program-item">';
                                                        }
                                                        echo '<div class="program-item-letter">';
                                                        echo $str;
                                                        echo '</div>';
                                                        $srch_ltr = $str;
                                                    }
                                                    echo '<li>';
                                                    echo '<a href="'. get_bloginfo('url') .'/'. $dept_tax .'/'. $dept_slug .'">';
                                                    echo $dept_name;
                                                    echo '</a>';
                                                    echo '</li>';
                                                }
                                                the_content();
                                            ?>
                                        </div>
                                    </div><!-- .entry-content -->
                                </article><!-- #post-<? the_ID(); ?> -->
                            </div><!-- #main -->
                        </div><!-- two-thirds -->
                        <? get_sidebar(); ?>
                    </div><!-- #content -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>

<? get_footer(); ?>
