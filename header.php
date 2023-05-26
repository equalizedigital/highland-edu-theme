<?
	defined('ABSPATH') OR exit;
	/**
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */
	session_start();
	if(!is_search()) {
        $is_page_locked_student = get_post_meta(get_the_id(), '_cmb_student_portal_checkbox', true);
        $is_page_locked_staff = get_post_meta(get_the_id(), '_cmb_staff_portal_checkbox', true);
        if (($is_page_locked_staff == 'on' && !$_SESSION['Login_Status']) || ($is_page_locked_student == 'on' && !$_SESSION['Login_Status'])) {
            $url = "https://login.highland.edu/";
            wp_redirect($url);
            die();
        }
        if (isset($_SESSION['Login_Status'])) {
            $url = "https://login.highland.edu/";
            if ($_SESSION['Login_Status'] == "staff") {
                $session_length = 3600;
            } else {
                $session_length = 1800;
                if ($is_page_locked_staff == 'on') {
                    $url = get_permalink(813);
                    wp_redirect($url);
                    die();
                }
            }
            if (isset($_SESSION['Last_Active']) && (time() - $_SESSION['Last_Active'] > $session_length)) {
                // last request was more than 30 minutes ago
                session_unset();     // unset $_SESSION variable for the run-time
                session_destroy();   // destroy session data in storage

                $url = "https://login.highland.edu/";
                wp_redirect($url);
                die();
            }
            $_SESSION['Last_Active'] = time(); // update last activity time stamp
        }
    }

?>