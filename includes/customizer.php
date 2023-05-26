<?php
// Remove unwanted areas
$wp_customize->remove_section('nav');
$wp_customize->remove_section('static_front_page');

//Foundation customizer starts at line 702 - 1/07/2022


//  =============================
//  =      Alert Section        =
//  =============================
$wp_customize->add_section( 'alert-options', array(
        'title'       => __( 'Alerts'),
    )
);
$ad_args = array(
    'post_type' => 'alert',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    'post_status' => 'publish'
);

$ads = new WP_Query($ad_args);

$ads_array = array();
$ads_array[0] = 'No Alert (off)';
while ($ads->have_posts()) : $ads->the_post();
    $ads_array[get_the_ID()] = get_the_title();
endwhile;
wp_reset_query();


$wp_customize->add_setting( 'alert_list', array(
    'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control( 'alert_list', array(
        'label'      => __('Alert'),
        'section'  => 'alert-options',
        'type'     => 'select',
        'choices'  => $ads_array,
    )
);


//  =============================
//  = Tracking Options                         =
//  =============================
$wp_customize->add_section( 'tracking_options', array(
        'title'       => __( 'Tracking Options'),
        'priority' => 10,
    )
);
// Site wide Tracking Code
$wp_customize->add_setting('sitewide_tracking_header_code');
$wp_customize->add_control('sitewide_tracking_header_code', array(
    'label'      => __('Site Wide Header Scripts'),
    'section'    => 'tracking_options',
    'type'  	 => 'textarea',
    'priority' 	=> 110,
));
// Site wide Tracking Code
$wp_customize->add_setting('sitewide_tracking_code');
$wp_customize->add_control('sitewide_tracking_code', array(
    'label'      => __('Site Wide Footer Scripts'),
    'section'    => 'tracking_options',
    'type'  	 => 'textarea',
    'priority' 	=> 120,
));


//  =============================
//  = Home Page Image                         =
//  =============================

$wp_customize->add_section( 'home-banner', array(
        'title'       => __( 'Home Page Options'),
        'priority' => 100,
    )
);



//Callout Image 1
$wp_customize->add_setting( 'callout_pic_one',
	array(
		'default'    => '',
		'type'       => 'theme_mod',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'callout_pic_one_image',
		array(
			'label'    => __( 'Callout Image #1' ),
			'section'  => 'home-banner',
			'settings' => 'callout_pic_one',
			'priority' => 140,
		)
	)
);

//Callout Image Alt Text
$wp_customize->add_setting('callout_alt_text_one');
$wp_customize->add_control('callout_alt_text_one', array(
    'label'      => __('Alt Text for Image #1'),
    'section'    => 'home-banner',
    'type'  	 => 'textarea',
    'priority' 	=> 142,
));

//Callout Header
$wp_customize->add_setting('callout_header_one');
$wp_customize->add_control('callout_header_one', array(
	'label'      => __('Header on Callout #1'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 145,
));

//Callout Title
$wp_customize->add_setting('callout_title_one');
$wp_customize->add_control('callout_title_one', array(
	'label'      => __('Title for Callout #1'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 150,
));

//Callout Text
$wp_customize->add_setting('callout_text_one');
$wp_customize->add_control('callout_text_one', array(
	'label'      => __('Text for Callout #1'),
	'section'    => 'home-banner',
	'type'  	 => 'textarea',
	'priority' 	=> 155,
));

//Callout Link
$wp_customize->add_setting('callout_link_one', array(
	'default'    => '',
	'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control('callout_link_one', array(
	'type' => 'dropdown-pages',
	'label' => 'Content #1 Link:',
	'section' => 'home-banner',
	'priority' 	=> 160,
));


//Callout Image 2
$wp_customize->add_setting( 'callout_pic_two',
	array(
		'default'    => '',
		'type'       => 'theme_mod',
	)
);


$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'callout_pic_two_image',
		array(
			'label'    => __( 'Callout Image #2' ),
			'section'  => 'home-banner',
			'settings' => 'callout_pic_two',
			'priority' => 165,
		)
	)
);

//Callout Image Alt Text
$wp_customize->add_setting('callout_alt_text_two');
$wp_customize->add_control('callout_alt_text_two', array(
    'label'      => __('Alt Text for Image #2'),
    'section'    => 'home-banner',
    'type'  	 => 'textarea',
    'priority' 	=> 167,
));

//Callout Header
$wp_customize->add_setting('callout_header_two');
$wp_customize->add_control('callout_header_two', array(
	'label'      => __('Header on Callout #2'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 170,
));

//Callout Title
$wp_customize->add_setting('callout_title_two');
$wp_customize->add_control('callout_title_two', array(
	'label'      => __('Title for Callout #2'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 175,
));

//Callout Text
$wp_customize->add_setting('callout_text_two');
$wp_customize->add_control('callout_text_two', array(
	'label'      => __('Text for Callout #2'),
	'section'    => 'home-banner',
	'type'  	 => 'textarea',
	'priority' 	=> 180,
));

//Callout Link
$wp_customize->add_setting('callout_link_two', array(
	'default'    => '',
	'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control('callout_link_two', array(
	'type' => 'dropdown-pages',
	'label' => 'Content #2 Link:',
	'section' => 'home-banner',
	'priority' 	=> 185,
));


//Callout Image 1
$wp_customize->add_setting( 'callout_pic_three',
	array(
		'default'    => '',
		'type'       => 'theme_mod',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'callout_pic_three_image',
		array(
			'label'    => __( 'Callout Image #3' ),
			'section'  => 'home-banner',
			'settings' => 'callout_pic_three',
			'priority' => 190,
		)
	)
);

//Callout Image Alt Text
$wp_customize->add_setting('callout_alt_text_three');
$wp_customize->add_control('callout_alt_text_three', array(
    'label'      => __('Alt Text for Image #3'),
    'section'    => 'home-banner',
    'type'  	 => 'textarea',
    'priority' 	=> 192,
));

//Callout Header
$wp_customize->add_setting('callout_header_three');
$wp_customize->add_control('callout_header_three', array(
	'label'      => __('Header on Callout #3'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 195,
));

//Callout Title
$wp_customize->add_setting('callout_title_three');
$wp_customize->add_control('callout_title_three', array(
	'label'      => __('Title for Callout #3'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 200,
));

//Callout Text
$wp_customize->add_setting('callout_text_three');
$wp_customize->add_control('callout_text_three', array(
	'label'      => __('Text for Callout #3'),
	'section'    => 'home-banner',
	'type'  	 => 'textarea',
	'priority' 	=> 205,
));

//Callout Link
$wp_customize->add_setting('callout_link_three', array(
	'default'    => '',
	'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control('callout_link_three', array(
	'type' => 'dropdown-pages',
	'label' => 'Content #3 Link:',
	'section' => 'home-banner',
	'priority' 	=> 210,
));


//Callout Image 1
$wp_customize->add_setting( 'callout_pic_four',
	array(
		'default'    => '',
		'type'       => 'theme_mod',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'callout_pic_four_image',
		array(
			'label'    => __( 'Callout Image #4' ),
			'section'  => 'home-banner',
			'settings' => 'callout_pic_four',
			'priority' => 215,
		)
	)
);

//Callout Image Alt Text
$wp_customize->add_setting('callout_alt_text_four');
$wp_customize->add_control('callout_alt_text_four', array(
    'label'      => __('Alt Text for Image #4'),
    'section'    => 'home-banner',
    'type'  	 => 'textarea',
    'priority' 	=> 217,
));

//Callout Header
$wp_customize->add_setting('callout_header_four');
$wp_customize->add_control('callout_header_four', array(
	'label'      => __('Header on Callout #4'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 220,
));

//Callout Title
$wp_customize->add_setting('callout_title_four');
$wp_customize->add_control('callout_title_four', array(
	'label'      => __('Title for Callout #4'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 225,
));

//Callout Text
$wp_customize->add_setting('callout_text_four');
$wp_customize->add_control('callout_text_four', array(
	'label'      => __('Text for Callout #4'),
	'section'    => 'home-banner',
	'type'  	 => 'textarea',
	'priority' 	=> 230,
));

//Callout Link
$wp_customize->add_setting('callout_link_four', array(
	'default'    => '',
	'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control('callout_link_four', array(
	'type' => 'dropdown-pages',
	'label' => 'Content #4 Link:',
	'section' => 'home-banner',
	'priority' 	=> 235,
));


//Callout Image 5
$wp_customize->add_setting( 'callout_pic_five',
	array(
		'default'    => '',
		'type'       => 'theme_mod',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'callout_pic_five_image',
		array(
			'label'    => __( 'Callout Image #5' ),
			'section'  => 'home-banner',
			'settings' => 'callout_pic_five',
			'priority' => 240,
		)
	)
);

//Callout Image Alt Text
$wp_customize->add_setting('callout_alt_text_five');
$wp_customize->add_control('callout_alt_text_five', array(
    'label'      => __('Alt Text for Image #5'),
    'section'    => 'home-banner',
    'type'  	 => 'textarea',
    'priority' 	=> 242,
));

//Callout Header
$wp_customize->add_setting('callout_header_five');
$wp_customize->add_control('callout_header_five', array(
	'label'      => __('Header on Callout #5'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 245,
));

//Callout Title
$wp_customize->add_setting('callout_title_five');
$wp_customize->add_control('callout_title_five', array(
	'label'      => __('Title for Callout #5'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 250,
));

//Callout Text
$wp_customize->add_setting('callout_text_five');
$wp_customize->add_control('callout_text_five', array(
	'label'      => __('Text for Callout #5'),
	'section'    => 'home-banner',
	'type'  	 => 'textarea',
	'priority' 	=> 255,
));

//Callout Link
$wp_customize->add_setting('callout_link_five', array(
	'default'    => '',
	'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control('callout_link_five', array(
	'type' => 'dropdown-pages',
	'label' => 'Content #5 Link:',
	'section' => 'home-banner',
	'priority' 	=> 260,
));


//Callout Image 6
$wp_customize->add_setting( 'callout_pic_six',
	array(
		'default'    => '',
		'type'       => 'theme_mod',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'callout_pic_six_image',
		array(
			'label'    => __( 'Callout Image #6' ),
			'section'  => 'home-banner',
			'settings' => 'callout_pic_six',
			'priority' => 265,
		)
	)
);

//Callout Image Alt Text
$wp_customize->add_setting('callout_alt_text_six');
$wp_customize->add_control('callout_alt_text_six', array(
    'label'      => __('Alt Text for Image #6'),
    'section'    => 'home-banner',
    'type'  	 => 'textarea',
    'priority' 	=> 267,
));

//Callout Header
$wp_customize->add_setting('callout_header_six');
$wp_customize->add_control('callout_header_six', array(
	'label'      => __('Header on Callout #6'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 270,
));

//Callout Title
$wp_customize->add_setting('callout_title_six');
$wp_customize->add_control('callout_title_six', array(
	'label'      => __('Title for Callout #6'),
	'section'    => 'home-banner',
	'type'  	 => 'text',
	'priority' 	=> 275,
));

//Callout Text
$wp_customize->add_setting('callout_text_six');
$wp_customize->add_control('callout_text_six', array(
	'label'      => __('Text for Callout #6'),
	'section'    => 'home-banner',
	'type'  	 => 'textarea',
	'priority' 	=> 280,
));

//Callout Link
$wp_customize->add_setting('callout_link_six', array(
	'default'    => '',
	'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control('callout_link_six', array(
	'type' => 'dropdown-pages',
	'label' => 'Content #6 Link:',
	'section' => 'home-banner',
	'priority' 	=> 285,
));

/*
$wp_customize->add_section( 'tour-dates-available', array(
		'title'       => __( 'Request a Tour Date Options'),
		'priority' => 300,
	)
);

$wp_customize->add_setting('tour_date_one');
$wp_customize->add_control('tour_date_one', array(
	'label'      => __('Tour Date #1'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_two');
$wp_customize->add_control('tour_date_two', array(
	'label'      => __('Tour Date #2'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_three');
$wp_customize->add_control('tour_date_three', array(
	'label'      => __('Tour Date #3'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_four');
$wp_customize->add_control('tour_date_four', array(
	'label'      => __('Tour Date #4'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_five');
$wp_customize->add_control('tour_date_five', array(
	'label'      => __('Tour Date #5'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_six');
$wp_customize->add_control('tour_date_six', array(
	'label'      => __('Tour Date #6'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_seven');
$wp_customize->add_control('tour_date_seven', array(
	'label'      => __('Tour Date #7'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_eight');
$wp_customize->add_control('tour_date_eight', array(
	'label'      => __('Tour Date #8'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_nine');
$wp_customize->add_control('tour_date_nine', array(
	'label'      => __('Tour Date #9'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));

$wp_customize->add_setting('tour_date_ten');
$wp_customize->add_control('tour_date_ten', array(
	'label'      => __('Tour Date #10'),
	'section'    => 'tour-dates-available',
	'type'  	 => 'text',
	'priority' 	=> 345,
));*/

//  =============================
//  = Parallax Area Options     =
//  =============================


$wp_customize->add_section( 'parallax-options', array(
        'title'       => __( 'Parallax Area Options'),
        'priority' => 400,
    )
);

// Parallax Image 1
$wp_customize->add_setting( 'highlight_pic_one',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'highlight_pic_one_image',
        array(
            'label'    => __( 'Highlight Area 1 Image' ),
            'section'  => 'parallax-options',
            'settings' => 'highlight_pic_one',
            'priority' => 405,
        )
    )
);

// Parallax Image Text
$wp_customize->add_setting('hightlight_text_one');
$wp_customize->add_control('hightlight_text_one', array(
    'label'      => __('Title on Highlight Area 1'),
    'section'    => 'parallax-options',
    'type'  	 => 'text',
    'priority' 	=> 410,
));

// Home Highlight Area 1
$wp_customize->add_setting('highlight_area_one', array(
    'default'    => '',
    'sanitize_callback' => 'example_sanitize_integer',
));
$wp_customize->add_control('highlight_area_one', array(
    'type' => 'dropdown-pages',
    'label' => 'Highlight Area 1 Link:',
    'section' => 'parallax-options',
    'priority' 	=> 420,
));

// Parallax Button Text
$wp_customize->add_setting('hightlight_button_text_one');
$wp_customize->add_control('hightlight_button_text_one', array(
    'label'      => __('Text on Button for Link'),
    'section'    => 'parallax-options',
    'type'  	 => 'text',
    'priority' 	=> 425,
));

// Parallax Image 2
$wp_customize->add_setting( 'highlight_pic_two',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'highlight_pic_two_image',
        array(
            'label'    => __( 'Highlight Image 2 Image' ),
            'section'  => 'parallax-options',
            'settings' => 'highlight_pic_two',
            'priority' => 430,
        )
    )
);

// Parallax Area 2 Title
$wp_customize->add_setting('hightlight_text_two');
$wp_customize->add_control('hightlight_text_two', array(
    'label'      => __('Title on Highlight Area 2'),
    'section'    => 'parallax-options',
    'type'  	 => 'text',
    'priority' 	=> 435,
));


// Parallax Image 3
$wp_customize->add_setting( 'highlight_pic_three',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'highlight_pic_three_image',
        array(
            'label'    => __( 'Highlight Image 3 Image' ),
            'section'  => 'parallax-options',
            'settings' => 'highlight_pic_three',
            'priority' => 435,
        )
    )
);

//  =============================
//  =        Foundation         =
//  =============================
$wp_customize->add_section( 'foundation', array(
        'title'       => __( 'Foundation Options'),
        'priority' => 500,
    )
);

//Main Campaign Header Text
$wp_customize->add_setting('legacy_campaign_main_hdr_txt');
$wp_customize->add_control('legacy_campaign_main_hdr_txt', array(
    'label'      => __('Legacy Campaign Main Header Text'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 504,
));

//Main Campaign Button Text
$wp_customize->add_setting('legacy_campaign_main_btn_txt');
$wp_customize->add_control('legacy_campaign_main_btn_txt', array(
    'label'      => __('Legacy Campaign Main Button Text'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 504,
));

//Main Campaign Button Link
$wp_customize->add_setting('legacy_campaign_main_btn_link');
$wp_customize->add_control('legacy_campaign_main_btn_link', array(
    'label'      => __('Legacy Campaign Main Button Link'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 506,
));

//Legacy Campaign Image
$wp_customize->add_setting( 'legacy_campaign_image',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_campaign_image_image',
        array(
            'label'    => __( 'Legacy Campaign Image' ),
            'section'  => 'foundation',
            'settings' => 'legacy_campaign_image',
            'priority' => 510,
        )
    )
);

//Campaign Header
$wp_customize->add_setting('legacy_campaign_header');
$wp_customize->add_control('legacy_campaign_header', array(
    'label'      => __('Legacy Campaign Header'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 512,
));

//Campaign Text
$wp_customize->add_setting('legacy_campaign_text');
$wp_customize->add_control('legacy_campaign_text', array(
    'label'      => __('Legacy Campaign Text'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 514,
));

//Legacy Slider #1
$wp_customize->add_setting( 'legacy_slider_image_one',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_slider_image_one_image',
        array(
            'label'    => __( 'Legacy Slider Image #1' ),
            'section'  => 'foundation',
            'settings' => 'legacy_slider_image_one',
            'priority' => 520,
        )
    )
);

//Legacy Name #1
$wp_customize->add_setting('legacy_slider_name_one');
$wp_customize->add_control('legacy_slider_name_one', array(
    'label'      => __('Legacy Slider Name #1'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 521,
));

//Legacy Header #1
$wp_customize->add_setting('legacy_slider_header_one');
$wp_customize->add_control('legacy_slider_header_one', array(
    'label'      => __('Legacy Slider Header #1'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 522,
));

//Legacy Text #1
$wp_customize->add_setting('legacy_slider_text_one');
$wp_customize->add_control('legacy_slider_text_one', array(
    'label'      => __('Legacy Slider Text #1'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 524,
));

//Legacy Slider #2
$wp_customize->add_setting( 'legacy_slider_image_two',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_slider_image_two_image',
        array(
            'label'    => __( 'Legacy Slider Image #2' ),
            'section'  => 'foundation',
            'settings' => 'legacy_slider_image_two',
            'priority' => 530,
        )
    )
);

//Legacy Name #2
$wp_customize->add_setting('legacy_slider_name_two');
$wp_customize->add_control('legacy_slider_name_two', array(
    'label'      => __('Legacy Slider Name #2'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 531,
));

//Legacy Header #2
$wp_customize->add_setting('legacy_slider_header_two');
$wp_customize->add_control('legacy_slider_header_two', array(
    'label'      => __('Legacy Campaign Header #2'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 532,
));

//Legacy Text #2
$wp_customize->add_setting('legacy_slider_text_two');
$wp_customize->add_control('legacy_slider_text_two', array(
    'label'      => __('Legacy Campaign Text #2'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 534,
));

//Legacy Slider #3
$wp_customize->add_setting( 'legacy_slider_image_three',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_slider_image_three_image',
        array(
            'label'    => __( 'Legacy Slider Image #3' ),
            'section'  => 'foundation',
            'settings' => 'legacy_slider_image_three',
            'priority' => 540,
        )
    )
);

//Legacy Name #3
$wp_customize->add_setting('legacy_slider_name_three');
$wp_customize->add_control('legacy_slider_name_three', array(
    'label'      => __('Legacy Slider Name #3'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 541,
));

//Legacy Header #3
$wp_customize->add_setting('legacy_slider_header_three');
$wp_customize->add_control('legacy_slider_header_three', array(
    'label'      => __('Legacy Campaign Header #3'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 542,
));

//Legacy Text #3
$wp_customize->add_setting('legacy_slider_text_three');
$wp_customize->add_control('legacy_slider_text_three', array(
    'label'      => __('Legacy Campaign Text #3'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 544,
));

//Legacy Higher Header
$wp_customize->add_setting('legacy_higher_header');
$wp_customize->add_control('legacy_higher_header', array(
    'label'      => __('Legacy Higher Header'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 550,
));

//Legacy Higher Text
$wp_customize->add_setting('legacy_higher_text');
$wp_customize->add_control('legacy_higher_text', array(
    'label'      => __('Legacy Higher Text'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 552,
));

//Legacy Higher Link
$wp_customize->add_setting('legacy_higher_link');
$wp_customize->add_control('legacy_higher_link', array(
    'label'      => __('Legacy Button Link'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 554,
));

//Legacy Higher Link Text
$wp_customize->add_setting('legacy_higher_link_text');
$wp_customize->add_control('legacy_higher_link_text', array(
    'label'      => __('Legacy Higher Button Text'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 556,
));

//Legacy Callout Icon #1
$wp_customize->add_setting( 'legacy_callout_icon_one',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_callout_icon_one_image',
        array(
            'label'    => __( 'Legacy Callout Icon #1' ),
            'section'  => 'foundation',
            'settings' => 'legacy_callout_icon_one',
            'priority' => 560,
        )
    )
);

//Legacy Header #3
$wp_customize->add_setting('legacy_callout_header_one');
$wp_customize->add_control('legacy_callout_header_one', array(
    'label'      => __('Legacy Callout Header #1'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 562,
));

//Legacy Text #3
$wp_customize->add_setting('legacy_callout_text_one');
$wp_customize->add_control('legacy_callout_text_one', array(
    'label'      => __('Legacy Callout Text #1'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 564,
));

//Legacy Callout Icon #2
$wp_customize->add_setting( 'legacy_callout_icon_two',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_callout_icon_two_image',
        array(
            'label'    => __( 'Legacy Callout Icon #2' ),
            'section'  => 'foundation',
            'settings' => 'legacy_callout_icon_two',
            'priority' => 570,
        )
    )
);

//Legacy Callout Header #2
$wp_customize->add_setting('legacy_callout_header_two');
$wp_customize->add_control('legacy_callout_header_two', array(
    'label'      => __('Legacy Callout Header #2'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 572,
));

//Legacy Callout Text #2
$wp_customize->add_setting('legacy_callout_text_two');
$wp_customize->add_control('legacy_callout_text_two', array(
    'label'      => __('Legacy Callout Text #2'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 574,
));

//Legacy Testimonial Image #1
$wp_customize->add_setting( 'legacy_test_img_one',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_test_img_one_image',
        array(
            'label'    => __( 'Legacy Testimonial Image #1' ),
            'section'  => 'foundation',
            'settings' => 'legacy_test_img_one',
            'priority' => 580,
        )
    )
);

//Legacy Testimonial Text #1
$wp_customize->add_setting('legacy_test_text_one');
$wp_customize->add_control('legacy_test_text_one', array(
    'label'      => __('Legacy Testimonial Text #1'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 582,
));

//Legacy Testimonial Name #1
$wp_customize->add_setting('legacy_test_name_one');
$wp_customize->add_control('legacy_test_name_one', array(
    'label'      => __('Legacy Testimonial Name #1'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 584,
));

//Legacy Testimonial Title #1
$wp_customize->add_setting('legacy_test_title_one');
$wp_customize->add_control('legacy_test_title_one', array(
    'label'      => __('Legacy Testimonial Title #1'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 586,
));

//Legacy Testimonial Image #2
$wp_customize->add_setting( 'legacy_test_img_two',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_test_img_two_image',
        array(
            'label'    => __( 'Legacy Testimonial Image #2' ),
            'section'  => 'foundation',
            'settings' => 'legacy_test_img_two',
            'priority' => 588,
        )
    )
);

//Legacy Testimonial Text #2
$wp_customize->add_setting('legacy_test_text_two');
$wp_customize->add_control('legacy_test_text_two', array(
    'label'      => __('Legacy Testimonial Text #2'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 590,
));

//Legacy Testimonial Name #2
$wp_customize->add_setting('legacy_test_name_two');
$wp_customize->add_control('legacy_test_name_two', array(
    'label'      => __('Legacy Testimonial Name #2'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 592,
));

//Legacy Testimonial Title #2
$wp_customize->add_setting('legacy_test_title_two');
$wp_customize->add_control('legacy_test_title_two', array(
    'label'      => __('Legacy Testimonial Title #2'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 594,
));

//Legacy Testimonial Image #3
$wp_customize->add_setting( 'legacy_test_img_three',
    array(
        'default'    => '',
        'type'       => 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'legacy_test_img_three_image',
        array(
            'label'    => __( 'Legacy Testimonial Image #3' ),
            'section'  => 'foundation',
            'settings' => 'legacy_test_img_three',
            'priority' => 596,
        )
    )
);

//Legacy Testimonial Text #3
$wp_customize->add_setting('legacy_test_text_three');
$wp_customize->add_control('legacy_test_text_three', array(
    'label'      => __('Legacy Testimonial Text #3'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 598,
));

//Legacy Testimonial Name #3
$wp_customize->add_setting('legacy_test_name_three');
$wp_customize->add_control('legacy_test_name_three', array(
    'label'      => __('Legacy Testimonial Name #3'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 600,
));

//Legacy Testimonial Title #3
$wp_customize->add_setting('legacy_test_title_three');
$wp_customize->add_control('legacy_test_title_three', array(
    'label'      => __('Legacy Testimonial Title #3'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 602,
));

//Legacy Community Header
$wp_customize->add_setting('legacy_comm_header');
$wp_customize->add_control('legacy_comm_header', array(
    'label'      => __('Legacy Community Header'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 604,
));

//Legacy Community Text
$wp_customize->add_setting('legacy_comm_text');
$wp_customize->add_control('legacy_comm_text', array(
    'label'      => __('Legacy Community Text'),
    'section'    => 'foundation',
    'type'  	 => 'textarea',
    'priority' 	=> 606,
));

//Legacy Community Link
$wp_customize->add_setting('legacy_comm_link');
$wp_customize->add_control('legacy_comm_link', array(
    'label'      => __('Legacy Community Link'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 604,
));

//Legacy Community Link Text
$wp_customize->add_setting('legacy_comm_link_text');
$wp_customize->add_control('legacy_comm_link_text', array(
    'label'      => __('Legacy Community Link Text'),
    'section'    => 'foundation',
    'type'  	 => 'text',
    'priority' 	=> 604,
));

function example_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}