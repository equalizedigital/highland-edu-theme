<?
	include('cmb2/cmb2-functions.php');

	add_action( 'cmb2_admin_init', 'mstar_register_metabox' );
	function mstar_register_metabox() {
		$prefix = '_cmb_';

		//Site Map
		$cmb_demo_map = new_cmb2_box(array(
			'id' => $prefix . 'sitemap',
			'title' => 'Page Restrictions',
			'object_types' => array('page',), // Post type
			'context' => 'side',
		));
		$cmb_demo_map->add_field(array(
			'id' => $prefix . 'sitemap_checkbox',
			'type' => 'checkbox',
			'before_row' => 'Check this box if you want this page removed from the site map.', // callback
		));
		$cmb_demo_map->add_field(array(
			'id' => $prefix . 'student_portal_checkbox',
			'type' => 'checkbox',
			'before_row' => 'Check this box to restrict access to this page. This page will only be accessible to STUDENTS who have logged in.', // callback
		));
		$cmb_demo_map->add_field(array(
			'id' => $prefix . 'staff_portal_checkbox',
			'type' => 'checkbox',
			'before_row' => 'Check this box to restrict access to this page. This page will only be accessible to STAFF who have logged in.', // callback
		));

		//D.O.G. Options
		$cmb_dog = new_cmb2_box(array(
        'id' => $prefix . 'dog_option',
        'title' => 'URL',
        'object_types' => array('program-info'), // Post type
    	));
		$cmb_dog->add_field(array(
        'name' => 'External Link',
        'id' => $prefix . 'external_url',
        'type' => 'text_url',
    ));



        //Landing Page Options
        $cmb_landing_page = new_cmb2_box(array(
            'id' => $prefix . 'admissions-page-form',
            'title' => 'Sidebar Form',
            'object_types' => array('hcc-opportunity'), // Post type
            'context' => 'side',
        ));
        /*$form_options = array();
        $forms = RGFormsModel::get_forms($active, "title"); // get list of forms
        foreach ($forms as $form) {
            //$form_options[] = array( 'name' => $form->title, 'value' => $form->id);
            $form_options[$form->id] = $form->title;
        }*/
        $cmb_landing_page->add_field(array(
            'name' => 'Title',
            'desc' => 'Text That will Appear Above The Sidebar Form',
            'id'   => $prefix . 'form_text_above',
            'type' => 'Text',
        ));
        $cmb_landing_page->add_field(array(
            'name' => 'Choose Form',
            'desc' => 'Gravity form to run in the sidebar',
            'id' => $prefix . 'gform_list',
            'type' => 'select',
            'show_option_none' => 'No Selection',
            'options' => $form_options,
        ));


        $cmb_landing_page_opt = new_cmb2_box(array(
            'id' => $prefix . 'admissions-news-options',
            'title' => 'Options',
            'object_types' => array('hcc-opportunity'), // Post type
        ));
        $cmb_landing_page_opt->add_field(array(
            'name' => 'Header Background Image',
            'desc' => 'Upload an image or enter a URL.',
            'id'   => $prefix . 'header_bg',
            'type' => 'file',
        ));
        $cmb_landing_page_opt->add_field( array(
            'name'    => 'Background Color for Title Line',
            'desc'    => 'field description (optional)',
            'id'      => $prefix . 'title_bg_color',
            'type'    => 'colorpicker',
            'default' => 'rgba(10,0,0,0.8)',
            'options' => array(
                'alpha' => true, // Make this a rgba color picker.
            ),
            // 'attributes' => array(
            // 	'data-colorpicker' => json_encode( array(
            // 		'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
            // 	) ),
            // ),
        ) );





        //Staff Options
		$cmb_staff = new_cmb2_box(array(
			'id' => $prefix . 'staff_options',
			'title' => 'Staff Options',
			'object_types' => array('staff'), // Post type
		));
		$cmb_staff->add_field(array(
			'name' => 'Last Name',
			'desc' => '<strong>used for sorting purposes<strong>',
			'id' => $prefix . 'staff_lname',
			'type' => 'text_medium'
		));
		$cmb_staff->add_field(array(
			'name' => 'Grade/Subjects',
			'id' => $prefix . 'staff_grade',
			'type' => 'text'
		));
		$cmb_staff->add_field(array(
			'name' => 'Phone Number',
			'id' => $prefix . 'staff_phone',
			'type' => 'text_medium'
		));
		$cmb_staff->add_field(array(
			'name' => 'Email Address',
			'id' => $prefix . 'staff_email',
			'type' => 'text_email'
		));

		//Story Options
		$cmb_story = new_cmb2_box(array(
			'id' => $prefix . 'story_options',
			'title' => 'Story Options',
			'object_types' => array('story'), // Post type
		));
		$cmb_story->add_field(array(
			'name' => 'Quoted From:',
			'desc' => '<strong>Who is this quote from?<strong>',
			'id' => $prefix . 'quoted',
			'type' => 'text'
		));

		//Schedule Options
		$cmb_schedule = new_cmb2_box(array(
			'id' => $prefix . 'schedule_options',
			'title' => 'Schedule Options',
			'object_types' => array('class'), // Post type
		));
		$cmb_schedule->add_field(array(
			'name' => 'Prerequisite',
			'desc' => '<strong>Yes/No: Does this class have any prerequisites?<strong>',
			'id' => $prefix . 'prerequisite',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Enrolled',
			'desc' => '<strong>Number of students enrolled in this class.<strong>',
			'id' => $prefix . 'enrolled',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Enrolled Max',
			'desc' => '<strong>Maximum amount of enrollment spots available.<strong>',
			'id' => $prefix . 'enrollment_max',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Course Number',
			'desc' => '<strong>What is the Course Number for this class? (i.e. 6780)<strong>',
			'id' => $prefix . 'course_number',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Course',
			'desc' => '<strong>Which Course is this? (i.e. 102)<strong>',
			'id' => $prefix . 'course',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Section',
			'desc' => '<strong>What Section is this class in?<strong>',
			'id' => $prefix . 'section',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Credit Hours',
			'desc' => '<strong>How many Credit Hours is this class.<strong>',
			'id' => $prefix . 'credit_hours',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Days',
			'desc' => '<strong>What days will class be held? i.e. MTWRF<strong>',
			'id' => $prefix . 'class_days',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Class Start Date',
			'desc' => '<strong>Required</strong>',
			'id' => $prefix . 'class_start_date',
			'type' => 'text_date_timestamp',
			'attributes'  => array(
				'required'    => 'required',
			),
			'column' => array(
				'position' => 2,
			),
		));
		$cmb_schedule->add_field(array(
			'name' => 'Class End Date',
			'desc' => '<strong>Required</strong>',
			'id' => $prefix . 'class_end_date',
			'type' => 'text_date_timestamp',
			'attributes'  => array(
				'required'    => 'required',
			)
		));
		$cmb_schedule->add_field(array(
			'name' => 'Class Start Time',
			'desc' => '(optional) - All-day event if left blank',
			'id' => $prefix . 'class_start_time',
			'type' => 'text_time'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Class End Time',
			'desc' => '(optional) - Ignored if no Start Time',
			'id' => $prefix . 'class_end_time',
			'type' => 'text_time'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Instructor',
			'desc' => '<strong>Who is teaching this class?<strong>',
			'id' => $prefix . 'instructor',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Location',
			'desc' => '<strong>Where will this class be held?<strong>',
			'id' => $prefix . 'class_location',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Fee',
			'desc' => '<strong>How much does this class cost?<strong>',
			'id' => $prefix . 'class_fee',
			'type' => 'text_money'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Course Materials',
			'desc' => '<strong>URL to the materials needed for this class.<strong>',
			'id' => $prefix . 'course_materials',
            'type' => 'text_url',
		));
		$cmb_schedule->add_field(array(
			'name' => 'Campus',
			'desc' => '<strong>What Campus is this class at?<strong>',
			'id' => $prefix . 'campus',
			'type' => 'text'
		));
		$cmb_schedule->add_field(array(
			'name' => 'Course Materials',
			'desc' => '<strong>What is the Course Materials link for this class?<strong>',
			'id' => $prefix . 'course_materials',
			'type' => 'text'
		));


        //Schedule Options
        $cmb_scholarship = new_cmb2_box(array(
            'id' => $prefix . 'scholarship_options',
            'title' => 'Scholarship Options',
            'object_types' => array('scholarship'), // Post type
        ));
        $cmb_scholarship->add_field(array(
            'name' => 'Application File',
            'id' => $prefix . 'application_file',
            'type' => 'file',
        ));
		//Call Report
		/* $cmb_call_tracking_code = new_cmb2_box(array(
			'id' => $prefix . 'call_report_tracking_code',
			'title' => 'Call Report Tracking Code',
			'object_types' => array('page'), // Post type
		));
		$cmb_call_tracking_code->add_field(array(
			'id' => $prefix . 'call_report_tracking_code',
			'type' => 'textarea_code',
            'attributes' => array(
                // Optionally override the code editor defaults.
                'data-codeeditor' => json_encode(array(
                    'codemirror' => array(
                        'lineNumbers' => false,
                        'mode' => 'css',
                    ),
                )),
            ),
            // To keep the previous formatting, you can disable codemirror.
            'options' => array('disable_codemirror' => true),
		));	*/
        $cmb_tracking_code = new_cmb2_box(array(
            'id' => $prefix . 'tracking_code',
            'title' => 'Tracking Code',
            'object_types' => array('page','class','staff','announcement','news', 'story', 'faq', 'human-resource', ), // Post type
        ));
        $cmb_tracking_code->add_field(array(
            'name' => 'Header Tracking Code',
            'id'   => $prefix . 'hdr_tracking_code',
            'type' => 'textarea_code',
            'attributes' => array(
                // Optionally override the code editor defaults.
                'data-codeeditor' => json_encode(array(
                    'codemirror' => array(
                        'lineNumbers' => false,
                        'mode' => 'css',
                    ),
                )),
            ),
            // To keep the previous formatting, you can disable codemirror.
            'options' => array('disable_codemirror' => true),
        ));
        $cmb_tracking_code->add_field(array(
            'name' => 'Footer Tracking Code',
            'id'   => $prefix . 'tracking_code',
            'type' => 'textarea_code',
            'attributes' => array(
                // Optionally override the code editor defaults.
                'data-codeeditor' => json_encode(array(
                    'codemirror' => array(
                        'lineNumbers' => false,
                        'mode' => 'css',
                    ),
                )),
            ),
            // To keep the previous formatting, you can disable codemirror.
            'options' => array('disable_codemirror' => true),
        ));
		//Video Options
		$cmb_video = new_cmb2_box(array(
			'id' => $prefix . 'video_option',
			'title' => 'Video Link',
			'object_types' => array('video'), // Post type
		));
		$cmb_video->add_field(array(
			'name' => 'Youtube Slug',
			'desc' => '</br><strong>SLUG ONLY!</strong></br>ie: http://www.youtube.com/watch?v=Z9rD4Paq0zE</br>Slug= <font size="3"><strong>Z9rD4Paq0zE</strong></font>',
			'id' => $prefix . 'video_url',
			'type' => 'text_medium'
		));
		/* $cmb_video->add_field(array(
	        'name' => 'Featured Video',
	        'desc' => 'will show up on home page video player',
	        'id'   => $prefix . 'featured_video',
	        'type' => 'checkbox',
	    ));	*/

		//Referable Service
		$cmb_podcast = new_cmb2_box(array(
			'id' => $prefix . 'referable_service',
			'title' => 'Referable Service',
			'object_types' => array('service'), // Post type
			'context' => 'side',
		));
		$cmb_podcast->add_field(array(
			'id' => $prefix . 'referable_service',
			'desc' => 'Indicates that this a Referable Service',
			'type' => 'checkbox',
		));

		//Post Options
		$cmb_podcast = new_cmb2_box(array(
			'id' => $prefix . 'post_options',
			'title' => 'Home Page Options',
			'object_types' => array('post'), // Post type
			'context' => 'side',
		));
		$cmb_podcast->add_field(array(
			'name' => 'Sticky!',
			'desc' => 'If checked, will <strong>stick</strong> to index',
			'id' => $prefix . 'stick_me',
			'type' => 'checkbox',
		));
		$cmb_podcast->add_field(array(
			'name' => 'Hide?',
			'desc' => 'If checked, will <strong>hide</strong> on index',
			'id' => $prefix . 'skip_me',
			'type' => 'checkbox',
		));

		/*/Event Options
		$cmb_event_ops = new_cmb2_box(array(
			'id' => $prefix . 'event_options',
			'title' => 'Event Options',
			'object_types' => array('event'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
		));
		$cmb_event_ops->add_field(array(
			'name' => 'Event Location',
			'id' => $prefix . 'event_location',
			'type' => 'text_medium',
		));
		$cmb_event_ops->add_field(array(
			'name' => 'Start Date',
			'desc' => '<strong>Required</strong>',
			'id' => $prefix . 'start_date',
			'type' => 'text_date_timestamp',
			'attributes'  => array(
				'required'    => 'required',
			),
			'column' => array(
				'position' => 2,
			),
		));
		$cmb_event_ops->add_field(array(
			'name' => 'Start Time',
			'desc' => '(optional) - All-day event if left blank',
			'id' => $prefix . 'start_time',
			'type' => 'text_time'
		));
		$cmb_event_ops->add_field(array(
			'name' => 'End Date',
			'desc' => '<strong>Required</strong>',
			'id' => $prefix . 'end_date',
			'type' => 'text_date_timestamp',
			'attributes'  => array(
				'required'    => 'required',
			)
		));
		$cmb_event_ops->add_field(array(
			'name' => 'End Time',
			'desc' => '(optional) - Ignored if no Start Time',
			'id' => $prefix . 'end_time',
			'type' => 'text_time'
		));
		$cmb_event_ops->add_field(array(
			'name' => 'Free Event',
			'desc' => '<strong>Check this box if there is no charge to attend this event.</strong>',
			'id' => $prefix . 'free_event_check',
			'type' => 'checkbox',
			//'default' => cmb2_set_checkbox_default_for_new_post( true ),
		));

		//Homepage Options
		$cmb_event_hp = new_cmb2_box(array(
			'id' => $prefix . 'event_options_hp',
			'title' => 'Show Event on Home Page',
			'object_types' => array('event'), // post type
			'context' => 'side',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
		));
		$cmb_event_hp->add_field(array(
			'desc' => '<strong>Display on the Home Page!</strong>',
			'id' => $prefix . 'home_page_checkbox',
			'type' => 'checkbox',
			//'default' => cmb2_set_checkbox_default_for_new_post( true ),
		));*/
        //Homepage Options
        $cmb_news_hp = new_cmb2_box(array(
            'id' => $prefix . 'news_options_hp',
            'title' => 'Show Home Page',
            'object_types' => array('news'), // post type
            'context' => 'side',
            'priority' => 'high',
            'show_names' => true, // Show field names on the left
        ));
        $cmb_news_hp->add_field(array(
            'desc' => '<strong>Display on the Home Page!</strong>',
            'id' => $prefix . 'home_news_checkbox',
            'type' => 'checkbox',
            //'default' => cmb2_set_checkbox_default_for_new_post( true ),
        ));


        //Event Options
        $cmb_cta_ops = new_cmb2_box(array(
            'id' => $prefix . 'cta_options',
            'title' => 'Call to Action Options',
            'object_types' => array('call-to-action'), // post type
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true, // Show field names on the left
        ));
        $cmb_cta_ops->add_field(array(
            'name' => 'Link',
            'id' => $prefix . 'cta_link',
            'type' => 'text_medium',
        ));

        //Team Member Options(post type = 'staff')
        $cmb_boardopts = new_cmb2_box(array(
            'id' => $prefix . 'board_options',
            'title' => 'Foundation Board Member Options',
            'object_types' => array('foundation-board'), // Post type
            'context' => 'normal',
        ));
        $cmb_boardopts->add_field(array(
            'name' => 'Last Name',
            'id' => $prefix . 'lname',
            'type' => 'text',
        ));
        $cmb_boardopts->add_field(array(
            'name' => 'Title',
            'id' => $prefix . 'title',
            'type' => 'text',
        ));

        //Alert Options
        $cmb_alerts = new_cmb2_box(array(
            'id' => $prefix . 'alert_options',
            'title' => 'Alert Options',
            'object_types' => array('alert'), // Post type
            'context' => 'normal',
        ));
        $cmb_alerts->add_field(array(
            'name' => 'Link to...',
            'id' => $prefix . 'alert_url',
            'type' => 'text_url',
        ));
	}


	//Term Meta Area
	add_action( 'cmb2_admin_init', 'mstar_register_taxonomy_metabox' );
	function mstar_register_taxonomy_metabox() {
		$prefix = 'mstar_term_';
		$cmb_term = new_cmb2_box( array(
			'id'               => $prefix . 'edit',
			'title'            => 'Category Metabox', // Doesn't output for term boxes
			'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
			'taxonomies'       => array( 'department' ), // Tells CMB2 which taxonomies should have these fields
			// 'new_term_section' => true, // Will display in the "Add New Category" section
		) );
		$cmb_term->add_field( array(
			'name'     => 'Display',
			'desc'     => 'Display on Academic Programs Page',
			'id'       => $prefix . 'display',
			'type'     => 'checkbox',
			'on_front' => false,
		) );
	}