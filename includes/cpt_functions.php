<?php
/***************** 
* Custom Post Type Generator
* Note: Slug name should match image name (16 x 40 px)
*
* ex: $cpt_holder[] = array('Single', 'Multiple', 'slug-name', array( 'title', 'editor', 'thumbnail', 'revisions'), true, true, 'dashicons-SOMETHING' ); 
* Look up icons here: https://developer.wordpress.org/resource/dashicons/#admin-home

*****************/

include('meta-tate.php');

// $cpt_holder[]	= array('Event', 'Events', 'event', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Class', 'Classes', 'class', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-book', array() );
$cpt_holder[]	= array('Call to Action', 'Call to Action', 'call-to-action', array( 'title', 'revisions' ), true, true, 'dashicons-megaphone', array() );
$cpt_holder[]	= array('Program Info', 'Program Info', 'program-info', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Scholarship', 'Scholarships', 'scholarship', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Staff', 'Staff', 'staff', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Foundation Board Member', 'Foundation Board Members', 'foundation-board', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Announcement', 'Announcements', 'announcement', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array( 'category' ) );
$cpt_holder[]	= array('News', 'News', 'news', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Story', 'Stories', 'story', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('FAQ', 'FAQs', 'faq', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Human Resource', 'Human Resources', 'human-resource', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Cougar Corner', 'Cougar Corner', 'cougar-corner', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Bulletin Board', 'Bulletin Board', 'bulletin-board', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Tour Date', 'Tour Dates', 'tour-date', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Landing Page', 'Landing Pages', 'hcc-opportunity', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Program', 'Programs', 'program-info', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, true, 'dashicons-calendar', array() );
$cpt_holder[]	= array('Alert', 'Alerts', 'alert', array( 'title', 'editor', 'thumbnail', 'revisions' ), true, false, false, false, 'dashicons-megaphone');




add_action( 'init', 'mstar_create_post_type', 10, 1);
function mstar_create_post_type() {
	global $cpt_holder;
	foreach ($cpt_holder as $cpt) {
		register_post_type( $cpt[2],				   
			array(
				'labels' => array(
                    'name' => $cpt[1],
                    'singular_name' => $cpt[0],
                    'add_new' => 'Add New ' .$cpt[0],
                    'add_new_item' => 'Add New ' .$cpt[0],
                    'edit_item' => 'Edit ' .$cpt[0],
                    'new_item' => 'New ' .$cpt[0],
                    'view_item' => 'View ' .$cpt[0],
                    'search_items' => 'Search ' .$cpt[1],
                    'not_found' => 'No ' .$cpt[1]. ' found',
				),
                'capability_type' => $cpt[2],
                'map_meta_cap' => true,
                'public' => true,
                'has_archive' => true,
                'supports' => $cpt[3],
                //'hierarchical' => $cpt[5],
                'menu_icon' => $cpt[6],
                'exclude_from_search' => !$cpt[4], // this is opposite, important
                'publicly_queryable' => $cpt[5],
                'taxonomies' => $cpt[7],
                'show_in_rest' => true,
			)
		);	
	}
}

/*****************/ 

// Custom Taxonomy
add_action( 'init', 'mstar_build_taxonomies', 0 );  

function mstar_build_taxonomies() {
	register_taxonomy(
		'department',
		array('class', 'staff', 'call-to-action'),
		array(
			'hierarchical' => true,
			'label' => 'Department',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'department',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	register_taxonomy(
		'location',
		'class',
		array(
			'hierarchical' => true,
			'label' => 'Location',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'location',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	register_taxonomy(
		'time_of_day',
		'class',
		array(
			'hierarchical' => true,
			'label' => 'Time of Day',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'time-of-day',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	register_taxonomy(
		'semester',
		'class',
		array(
			'hierarchical' => true,
			'label' => 'Semester',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'semester',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	/*register_taxonomy(
		'subject',
		'class',
		array(
			'hierarchical' => true,
			'label' => 'Subject',
			'query_var' => true,
			'rewrite' => true
		)
	);*/
	register_taxonomy(
		'lifelong_learning',
		'class',
		array(
			'hierarchical' => true,
			'label' => 'Lifelong Learning',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'class',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
    register_taxonomy(
        'staff-member-location',
        'staff',
        array(
            'hierarchical' => true,
            'label' => 'Location',
            'query_var' => true,
            'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'staff-member-location',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );
    register_taxonomy(
        'staff-member-type',
        'staff',
        array(
            'hierarchical' => true,
            'label' => 'Staff Type',
            'query_var' => true,
            'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'staff-member-type',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
        )
    );
	register_taxonomy(
		'job-member-position',
		'staff',
		array(
			'hierarchical' => true,
			'label' => 'Position',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'job-member-position',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	register_taxonomy(
		'academic_interest',
		'scholarship',
		array(
			'hierarchical' => true,
			'label' => 'Academic Interest',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'academic-interest',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	register_taxonomy(
		'add_reqs',
		'scholarship',
		array(
			'hierarchical' => true,
			'label' => 'Additional Requirements',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'add-reqs',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	/*register_taxonomy(
		'scholarship_gender',
		'scholarship',
		array(
			'hierarchical' => true,
			'label' => 'Gender',
			'query_var' => true,
			'rewrite' => true
		)
	);*/
	register_taxonomy(
		'enrollment_status',
		'scholarship',
		array(
			'hierarchical' => true,
			'label' => 'Enrollment Status',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'enrollment-status',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);

	register_taxonomy(
		'scholarship_fafsa',
		'scholarship',
		array(
			'hierarchical' => true,
			'label' => 'Fafsa',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'scholarship-fafsa',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);

	register_taxonomy(
		'scholarship_gpa',
		'scholarship',
		array(
			'hierarchical' => true,
			'label' => 'GPA',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'scholarship-gpa',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
	register_taxonomy(
		'scholarship_residence',
		'scholarship',
		array(
			'hierarchical' => true,
			'label' => 'Residence',
			'query_var' => true,
			'rewrite' => true,
            'show_in_rest' => true,
            'rest_base' => 'scholarship-residence',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
		)
	);
    /*register_taxonomy(
        'board-member-type',
        'foundation-board',
        array(
            'hierarchical' => true,
            'label' => 'Foundation Board Member Type',
            'query_var' => true,
            'rewrite' => true,
        )
    );
	register_taxonomy(
		'announcement_type',
		'announcement',
		array(
			'hierarchical' => true,
			'label' => 'Announcement Type',
			'query_var' => true,
			'rewrite' => true
		)
	);*/
}
