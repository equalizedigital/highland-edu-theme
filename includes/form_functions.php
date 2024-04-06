<?
	function populate_withdrawal_hash($form){
		$random_hash = md5(uniqid(rand(), true));
		foreach ($form["fields"] as &$field) {
			if ($field["id"] == 9) {
				$field["defaultValue"] = $random_hash;
			}
		}
		return $form;
	}
	add_filter( 'gform_pre_render_17', 'populate_withdrawal_hash' );

	function change_autoresponder_email( $notification, $form, $entry ) {
		// There is no concept of user notifications anymore, so
		// we will need to target notifications based on other
		// criteria, such as name
		$notification['toType'] = 'email';
		$notification['to'] = $entry["11"];//'rlancaster@morningstarmediagroup.com';

		if($entry[10] == "Confirmed"){
			$f_name = $entry["1.3"];
			$m_init = $entry["1.4"];
			$l_name = $entry["1.6"];
			$suffix = $entry["1.8"];
			$stdnt_id = $entry["2"];
			$stdnt_eml = $entry["11"];
			$course = $entry["7"];
			$course_numb = $entry["3"];
			$subject = $entry["4"];
			$subject_num = $entry["5"];
			$section = $entry["6"];
			$sem_hours = $entry["8"];
			$eHash = $entry["9"];
			$comments = $entry["15"];
			$html = "<p>A course withdrawal request has been confirmed. Details can be found below.</p>";
			$html .= "<p>Name: ".$f_name." ".$l_name." ".$suffix."</p>";
			$html .= "<p>Student ID: ".$stdnt_id."</p>";
			$html .= "<p>Student Email: <a href='mailto:".$stdnt_eml."'>".$stdnt_eml."</a></p>";
			$html .= "<p>Course: #".$course_numb." - ".$course."</p>";
			$html .= "<p>Subject: #".$subject_num." - ".$subject."</p>";
			$html .= "<p>Section: ".$section."</p>";
			$html .= "<p>Semester Hours: ".$sem_hours."</p>";
			$html .= "<p>Comments: ".$comments."</p>";
			$notification['toType'] = 'email';
			$notification['to'] = 'Jeremy.Bradt@highland.edu,Susie.Dvorak@highland.edu,rlancaster@morningstarmediagroup.com'; //get_option( 'admin_email' );
			$notification['message'] = $html;
		}
		/*if ( $notification['name'] == 'User Notification' ) {
			// toType can be routing or email
			$notification['toType'] = 'email';
			// change the "to" email address
			$notification['to'] = 'test@test.com';
		}
		if ( $notification['name'] == 'Admin Notification' ) {
			// toType can be routing or email
			$notification['toType'] = 'email';
			// change the "to" email address
			$notification['to'] = 'test@test.com';
		}*/
		return $notification;
	}
	add_filter( 'gform_notification_17', 'change_autoresponder_email', 10, 3 );

/*function populate_fields( $form ) {
	$date_1         = get_theme_mod( 'tour_date_one' );
	$date_2         = get_theme_mod( 'tour_date_two' );
	$date_3         = get_theme_mod( 'tour_date_three' );
	$date_4         = get_theme_mod( 'tour_date_four' );
	$date_5         = get_theme_mod( 'tour_date_five' );
	$date_6         = get_theme_mod( 'tour_date_six' );
	$date_7         = get_theme_mod( 'tour_date_seven' );
	$date_8         = get_theme_mod( 'tour_date_eight' );
	$date_9         = get_theme_mod( 'tour_date_nine' );
	$date_10        = get_theme_mod( 'tour_date_ten' );

	foreach ($form["fields"] as &$field) {
		if ($field["id"] == 9) {//secondary location
			$dates = array();
			$dates[] = array("text" => __('Select a location...', 'mercy-theme'), "value" => 0);
			//$loc = str_replace("&#8217;", "'", get_the_title());
			//trigger_error("Function triggered, connected location = " . $locs[1], E_USER_NOTICE);
			//trigger_error("Function triggered, connected location = " . get_the_title(), E_USER_NOTICE);
			$dates[] = array("text" => $date_1, "value" => $date_1);
			$dates[] = array("text" => $date_2, "value" => $date_2);
			$dates[] = array("text" => $date_3, "value" => $date_3);
			$dates[] = array("text" => $date_4, "value" => $date_4);
			$dates[] = array("text" => $date_5, "value" => $date_5);
			$dates[] = array("text" => $date_6, "value" => $date_6);
			$dates[] = array("text" => $date_7, "value" => $date_7);
			$dates[] = array("text" => $date_8, "value" => $date_8);
			$dates[] = array("text" => $date_9, "value" => $date_9);
			$dates[] = array("text" => $date_10, "value" => $date_10);

			$field["choices"] = $dates;
		}
	}
}
add_filter( 'gform_pre_render_12', 'populate_fields' );*/