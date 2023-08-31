<?
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

<div class="super-container interior-page">
    <div class="container">
        <div class="sixteen columns alpha">
            <div id="primary" class="full-width">
                <div id="content">
                    <div class="two-thirds column alpha">
                        <main class="main" id="main-content">
                            <? the_post(); ?>
                            <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                                <header class="entry-header">
                                    <h1 class="entry-title"><? the_title(); ?></h1>
                                </header><!-- .entry-header -->
                                <div class="entry-content">
                                    <?
                                    //academic_interests
                                    $academic_interests = get_the_terms($post->ID, 'academic_interest');
                                    $the_academic_interests = '';
                                    if(!empty($academic_interests)){
                                        $academic_interests_out = array();
                                        foreach($academic_interests as $academic_interest){
                                            $academic_interests_out[] = $academic_interest->name;
                                        }
                                        $the_academic_interests = implode(", ", $academic_interests_out);
                                    }

                                    /* /gender
                                    $genders = get_the_terms($post->ID, 'scholarship_gender');
                                    $the_genders = '';
                                    if(!empty($genders)){
                                        $gender_out = array();
                                        foreach($genders as $gender){
                                            $gender_out[] = $gender->name;
                                        }
                                        $the_genders = implode(", ", $gender_out);
                                    }*/

                                    //enrollment_status
                                    $enrollment_status = get_the_terms($post->ID, 'enrollment_status');
                                    $the_enrollment_status = '';
                                    if(!empty($enrollment_status)){
                                        $enrollment_status_out = array();
                                        foreach($enrollment_status as $enrollment_stat){
                                        $enrollment_status_out[] = $enrollment_stat->name;
                                        }
                                        $the_enrollment_status = implode(", ", $enrollment_status_out);
                                    }

                                    //scholarship_ethnicity
                                    $scholarship_ethnicities = get_the_terms($post->ID, 'scholarship_ethnicity');
                                    $the_scholarship_ethnicities = '';
                                    if(!empty($scholarship_ethnicities)){
                                        $scholarship_ethnicities_out = array();
                                        foreach($scholarship_ethnicities as $scholarship_ethnicity){
                                            $scholarship_ethnicities_out[] = $scholarship_ethnicity->name;
                                        }
                                        $the_scholarship_ethnicities = implode(", ", $scholarship_ethnicities_out);
                                    }

                                    //scholarship_gpa
                                    $scholarship_gpas = get_the_terms($post->ID, 'scholarship_gpa');
                                    $the_scholarship_gpas = '';
                                    if(!empty($scholarship_gpas)){
                                        $scholarship_gpas_out = array();
                                        foreach($scholarship_gpas as $scholarship_gpa){
                                            $scholarship_gpas_out[] = $scholarship_gpa->name;
                                        }
                                        $the_scholarship_gpas = implode(", ", $scholarship_gpas_out);
                                    }

                                    //scholarship_residence
                                    $scholarship_residenceies = get_the_terms($post->ID, 'scholarship_residence');
                                    $the_scholarship_residenceies = '';
                                    if(!empty($scholarship_residenceies)){
                                        $scholarship_residenceies_out = array();
                                        foreach($scholarship_residenceies as $scholarship_residence){
                                            $scholarship_residenceies_out[] = $scholarship_residence->name;
                                        }
                                        $the_scholarship_residenceies = implode(", ", $scholarship_residenceies_out);
                                    }

                                    $scholarship_document = get_post_meta($post->ID, '_cmb_application_file', true);

                                    if($the_academic_interests) {
                                        echo '<h2>Academic Interest:</h2>';
                                        echo '<p>' . $the_academic_interests . '</p>';
                                    }
                                    /*if($the_academic_interests) {
                                        echo '<h2>Qualifying Gender:</h2>';
                                        echo '<p>' . $the_genders . '</p>';
                                    }*/
                                    if($the_enrollment_status) {
                                        echo '<h2>Enrollment Status:</h2>';
                                        echo '<p>' . $the_enrollment_status . '</p>';
                                    }
                                    if($the_scholarship_ethnicities) {
                                        echo '<h2>Qualifying Ethnicities:</h2>';
                                        echo '<p>' . $the_scholarship_ethnicities . '</p>';
                                    }
                                    if($the_scholarship_gpas) {
                                        echo '<h2>Qualifying GPA:</h2>';
                                        echo '<p>' . $the_scholarship_gpas . '</p>';
                                    }
                                    if($the_scholarship_residenceies) {
                                        echo '<h2>Qualifying Residence:</h2>';
                                        echo '<p>' . $the_scholarship_residenceies . '</p>';
                                    }
                                    if($scholarship_document){
                                        echo '<a href="'.$scholarship_document.'"class="document-download-link">Download File</a>';
                                    }

                                    ?>
                                </div><!-- .entry-content -->
                            </article><!-- #post-<? the_ID(); ?> -->
                        </main><!-- #main -->
                    </div><!-- two-thirds -->
                    <? get_sidebar('page'); ?>
                </div><!-- #content -->
            </div><!-- #primary -->
        </div>
    </div>
</div>
<? get_footer(); ?>