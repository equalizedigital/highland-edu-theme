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
                            <main id="main-content" class="main">
                                <? the_post(); ?>
                                <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                                    <header class="entry-header">
                                        <h1 class="entry-title"><? the_title(); ?></h1>
                                    </header><!-- .entry-header -->
                                    <div class="entry-content class-single">
                                        <?
                                        //departments
                                        $departments = get_the_terms($post->ID, 'department');
                                        $the_departments = '';
                                        if(!empty($departments)){
                                            $departments_out = array();
                                            foreach($departments as $department){
                                                $departments_out[] = $department->name;
                                            }
                                            $the_departments = implode(", ", $departments_out);
                                        }
                                        //locations
                                        $locations = get_the_terms($post->ID, 'location');
                                        $the_locations = '';
                                        if(!empty($locations)){
                                            $locations_out = array();
                                            foreach($locations as $location){
                                                $locations_out[] = $location->name;
                                            }
                                            $the_locations = implode(", ", $locations_out);
                                        }
                                        //Time of Day
                                        $tods = get_the_terms($post->ID, 'time_of_day');
                                        $the_tods = '';
                                        if(!empty($tods)){
                                            $tods_out = array();
                                            foreach($tods as $tod){
                                                $tods_out[] = $tod->name;
                                            }
                                            $the_tods = implode(", ", $tods_out);
                                        }
                                        //Semester
                                        $semesters = get_the_terms($post->ID, 'semester');
                                        $the_semesters = '';
                                        if(!empty($semesters)){
                                            $semesters_out = array();
                                            foreach($semesters as $semester){
                                                $semesters_out[] = $semester->name;
                                            }
                                            $the_semesters = implode(", ", $semesters_out);
                                        }
                                        //Lifelong Learning
                                        $lifelong_learnings = get_the_terms($post->ID, 'lifelong_learning');
                                        $the_lifelong_learnings = '';
                                        if(!empty($lifelong_learnings)){
                                            $lifelong_learnings_out = array();
                                            foreach($lifelong_learnings as $lifelong_learning){
                                                $lifelong_learnings_out[] = $lifelong_learning->name;
                                            }
                                            $the_lifelong_learnings = implode(", ", $lifelong_learnings_out);
                                        }

                                        $class_prerequisite  = get_post_meta($post->ID, '_cmb_prerequisite', true);
                                        $class_enrolled      = get_post_meta($post->ID, '_cmb_enrolled', true);
                                        $class_enrolled_max  = get_post_meta($post->ID, '_cmb_enrollment_max', true);
                                        $class_credit_hours  = get_post_meta($post->ID, '_cmb_credit_hours', true);
                                        $class_days          = get_post_meta($post->ID, '_cmb_class_days', true);
                                        $class_start_date    = get_post_meta($post->ID, '_cmb_class_start_date', true);
                                        $class_end_date      = get_post_meta($post->ID, '_cmb_class_end_date', true);
                                        $class_start_time    = get_post_meta($post->ID, '_cmb_class_start_time', true);
                                        $class_end_time      = get_post_meta($post->ID, '_cmb_class_end_time', true);
                                        $class_instructor    = get_post_meta($post->ID, '_cmb_instructor', true);
                                        $class_location      = get_post_meta($post->ID, '_cmb_class_location', true);
                                        $class_fee           = get_post_meta($post->ID, '_cmb_class_fee', true);
                                        $class_document      = get_post_meta($post->ID, '_cmb_course_materials', true);
                                        $class_course_num    = get_post_meta($post->ID, '_cmb_course_number', true);

                                        if( $class_prerequisite) {
                                            echo '<h3>A prerequisite is required for this class</h3>';
                                        }
                                        if( $the_lifelong_learnings) {
                                            echo '<h3>This class qualifies as a life long learning class.</h3>';
                                        }
                                        if( $the_locations) {
                                            echo '<h2>Locations:</h2>';
                                            echo '<p>' .  $the_locations . '</p>';
                                        }
                                        if( $class_location) {
                                            echo '<h2>Specific Location on Campus:</h2>';
                                            echo '<p>' . $class_location .'</p>';
                                        }
                                        if( $the_departments) {
	                                        echo '<h2>Departments:</h2>';
	                                        echo '<p>' .  $the_departments . '</p>';
                                        }
                                        if( $class_course_num) {
	                                        echo '<h2>Course Number:</h2>';
	                                        echo '<p>' .  $class_course_num . '</p>';
                                        }
                                        if( $class_instructor) {
                                            echo '<h2>Instructor:</h2>';
                                            echo '<p>' .  $class_instructor . '</p>';
                                        }
                                        if( $class_credit_hours) {
                                            echo '<h2>Credit Hours:</h2>';
                                            echo '<p>' .  $class_credit_hours . '</p>';
                                        }
                                        if( $class_start_date) {
                                            echo '<h2>Class Running Time</h2>';
                                            echo '<p>' .  date('F j , Y', $class_start_date). ' - ' . date('F j , Y', $class_end_date) .' </p>';
                                        }
                                        if( $class_start_time) {
                                            echo '<h2>Meeting Time</h2>';
                                            echo '<p>' . $class_start_time . ' - ' . $class_end_time . ' </p>';
                                        }
                                        if( $class_days) {
                                            echo '<h2>Days The Class Meets:</h2>';
                                            echo '<p>' .  $class_days . '</p>';
                                        }
                                        if( $the_tods) {
                                            echo '<h2>Time of Day Offered:</h2>';
                                            echo '<p>' .  $the_tods . '</p>';
                                        }
                                        if( $the_semesters) {
                                            echo '<h2>Semester Offered:</h2>';
                                            echo '<p>' .  $the_semesters . '</p>';
                                        }
                                        if( $class_enrolled_max) {
                                            echo '<h2>Class Capacity:</h2>';
                                            echo '<p>' .  $class_enrolled_max . ' Students</p>';
                                        }
                                        if( $class_enrolled) {
                                            echo '<h2>Currently Enrolled:</h2>';
                                            echo '<p>' .  $class_enrolled . ' Students</p>';
                                        }
                                        if( $class_fee) {
                                            echo '<h2>Class Fee:</h2>';
                                            echo '<p>' .  $class_fee . '</p>';
                                        }



                                        if($class_document){
                                            echo '<a href="'.$class_document.'" target="_blank">Course Materials</a>';
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