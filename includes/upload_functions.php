<?
/*The PCPExcel library performs all the magic
 * which we use to convert the xls into a more
 * php friendly csv file.
 */
//require ('PHPEXCEL/Classes/PHPExcel/IOFactory.php');
//include autoloader
require 'phpoffice/vendor/autoload.php';

//load dependencies
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use \PhpOffice\PhpSpreadsheet\Writer\Csv;

/* Adding a filter to 'hook' into the
 * gform_after_submission function for the form
 * with the id (4). When Gravity Forms fires this
 * function off, we will replace it with our own
 * custom code that uses the PHPExcel library to
 * read the .xls file and convert it to a .csv
 * file.
 */
add_filter("gform_after_submission_2", "capture_file_2", 10, 2);
function capture_file_2($entry){
	if(isset($_FILES['input_1'])){
		$args = array(
			'posts_per_page' => -1,
			'post_type' => array('class')
		);
		$class_posts = get_posts($args);
		foreach($class_posts as $class_post) {
			//Delete's each post.
			wp_delete_post( $class_post->ID, true);
			//Set to False if you want to send them to Trash.
		}

		$file_url = $entry['1'];
		$upload_dir = wp_upload_dir();
		$file_data = file_get_contents($file_url);
		$filename = basename($file_url);
		$file = $upload_dir['basedir'].'/'.$filename;
		file_put_contents($file, $file_data);

		/*/$inputFileType = 'Excel5';
		$inputFileType = PHPExcel_IOFactory::identify($file);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcelReader = $objReader->load($file);

		$loadedSheetNames = $objPHPExcelReader->getSheetNames();

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcelReader, 'CSV'); */

        $reader = new Xlsx();
        $spreadsheet = $reader->load($file);

        $loadedSheetNames = $spreadsheet->getSheetNames();

        $objWriter = new Csv($spreadsheet);

		foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
			$objWriter->setSheetIndex($sheetIndex);
			$new_path = $upload_dir['basedir'].'/'.$loadedSheetName.'.csv';
			$objWriter->save($new_path);
		}
		$csvData = file_get_contents($new_path);
		$lines = explode(PHP_EOL, $csvData);
		$array = array();
		foreach ($lines as $line) {
			$array[] = str_getcsv($line);
		}
		//var_viewer($array);
		for($i = 1; $i <= count($array) -2; $i++){
			$page = array();
			$prefix = '_cmb_';
			$new_entry = $array[$i];
			/*if(get_page_by_path($new_entry[0], OBJECT, 'class')){
				$page = get_page_by_path($new_entry[0], OBJECT, 'class');
			}*/
			if(empty($page)){
				$insert_data = wp_insert_post(
					array(
						'comment_status' => 'closed',
						'ping_status' => 'closed',
						'post_author' => 1,
						'post_title' => $new_entry[7],
						'post_name' => $new_entry[7],
						'post_status' => 'publish',
						'post_type' => 'class'
					)
				);
			} else {
				$insert_data = $page->ID;
			}
			//$new_entry is the cell (left to right) of each row in the spreadsheet starting with 0 and ending with 17
			if($new_entry[0]){ //Prerequisite
				update_post_meta($insert_data, $prefix.'prerequisite', trim($new_entry[0]));
			}
			if($new_entry[1]){ //Enroll Max
				update_post_meta($insert_data, $prefix.'enrollment_max', trim($new_entry[1]));
			}
			if($new_entry[2]){ //Enrolled
				update_post_meta($insert_data, $prefix.'enrolled', trim($new_entry[2]));
			}
			if($new_entry[3]){ //CRN --- Not entered yet ---
				update_post_meta($insert_data, $prefix.'course_number', trim($new_entry[3]));
			}
			if($new_entry[4]){ //Department --- Not entered yet ---
				if(trim($new_entry[4]) == "ABCO"){ $dept = "Adult Basic Communication"; }
				if(trim($new_entry[4]) == "ABE"){ $dept = "Adult Basic Education"; }
				if(trim($new_entry[4]) == "ABEN"){ $dept = "Adult Basic English"; }
				if(trim($new_entry[4]) == "ABHI"){ $dept = "Adult Basic History"; }
				if(trim($new_entry[4]) == "ABHS"){ $dept = "Adult Basic Health/Safety"; }
				if(trim($new_entry[4]) == "ABIC"){ $dept = "Adult Basic Interpersl Comm"; }
				if(trim($new_entry[4]) == "ABJS"){ $dept = "Adult Basic Job Skills"; }
				if(trim($new_entry[4]) == "ABMA"){ $dept = "Adult Basic Math"; }
				if(trim($new_entry[4]) == "ABOR"){ $dept = "Adult Basic Orientation"; }
				if(trim($new_entry[4]) == "ABRE"){ $dept = "Adult Basic Reading"; }
				if(trim($new_entry[4]) == "ABSC"){ $dept = "Adult Basic Science"; }
				if(trim($new_entry[4]) == "ACCT"){ $dept = "Accounting"; }
				if(trim($new_entry[4]) == "ACHR"){ $dept = "Air Conditioning and Heating"; }
				if(trim($new_entry[4]) == "AGME"){ $dept = "Agricultural Mechanics"; }
				if(trim($new_entry[4]) == "AGOC"){ $dept = "Agricultural Occupations"; }
				if(trim($new_entry[4]) == "AGRI"){ $dept = "Agriculture"; }
				if(trim($new_entry[4]) == "ART"){ $dept = "Art"; }
				if(trim($new_entry[4]) == "ASCO"){ $dept = "Adult Secondary Communication"; }
				if(trim($new_entry[4]) == "ASE"){ $dept = "Adult Secondary Education"; }
				if(trim($new_entry[4]) == "ASEN"){ $dept = "Adult Secondary English"; }
				if(trim($new_entry[4]) == "ASHI"){ $dept = "Adult Secondary History"; }
				if(trim($new_entry[4]) == "ASHS"){ $dept = "Adult Secondary Health/Safety"; }
				if(trim($new_entry[4]) == "ASJS"){ $dept = "Adult Secondary Communication"; }
				if(trim($new_entry[4]) == "ASMA"){ $dept = "Adult Secondary Math"; }
				if(trim($new_entry[4]) == "ASOR"){ $dept = "Adult Secondary Orientation"; }
				if(trim($new_entry[4]) == "ASRE"){ $dept = "Adult Secondary Reading"; }
				if(trim($new_entry[4]) == "ASSC"){ $dept = "Adult Secondary Science"; }
				if(trim($new_entry[4]) == "AUTB"){ $dept = "Autobody"; }
				if(trim($new_entry[4]) == "AUTM"){ $dept = "Automotive Mechanics"; }
				if(trim($new_entry[4]) == "BANK"){ $dept = "Banking"; }
				if(trim($new_entry[4]) == "BIOL"){ $dept = "Biology"; }
				if(trim($new_entry[4]) == "BMAC"){ $dept = "Business Machines"; }
				if(trim($new_entry[4]) == "BSED"){ $dept = "Business Education"; }
				if(trim($new_entry[4]) == "BUSN"){ $dept = "Business Administration"; }
				if(trim($new_entry[4]) == "CEAG"){ $dept = "Agricultural Management"; }
				if(trim($new_entry[4]) == "CED"){ $dept = "Continuing Education"; }
				if(trim($new_entry[4]) == "CHEM"){ $dept = "Chemistry"; }
				if(trim($new_entry[4]) == "CHLD"){ $dept = "Early Childhood Education"; }
				if(trim($new_entry[4]) == "CJS"){ $dept = "Criminal Justice"; }
				if(trim($new_entry[4]) == "COMM"){ $dept = "Communications"; }
				if(trim($new_entry[4]) == "CONT"){ $dept = "Continuing Education"; }
				if(trim($new_entry[4]) == "COSL"){ $dept = "Cosmetology Skills"; }
				if(trim($new_entry[4]) == "COSM"){ $dept = "Cosmetology"; }
				if(trim($new_entry[4]) == "DATP"){ $dept = "Data Processing"; }
				if(trim($new_entry[4]) == "DIES"){ $dept = "Diesel Mechanics"; }
				if(trim($new_entry[4]) == "DRAF"){ $dept = "Drafting"; }
				if(trim($new_entry[4]) == "ECE"){ $dept = "Early Childhood Education"; }
				if(trim($new_entry[4]) == "ECON"){ $dept = "Economics"; }
				if(trim($new_entry[4]) == "EDU"){ $dept = "Education"; }
				if(trim($new_entry[4]) == "EDUC"){ $dept = "Education"; }
				if(trim($new_entry[4]) == "ELEL"){ $dept = "Electronics Technology Lab"; }
				if(trim($new_entry[4]) == "ELEM"){ $dept = "Electronic Maintenance"; }
				if(trim($new_entry[4]) == "ELET"){ $dept = "Electronics Technology Lect"; }
				if(trim($new_entry[4]) == "ENGL"){ $dept = "English"; }
				if(trim($new_entry[4]) == "EQUI"){ $dept = "Equine Science"; }
				if(trim($new_entry[4]) == "ESL"){ $dept = "English as a Second Language"; }
				if(trim($new_entry[4]) == "FOOD"){ $dept = "Food Service"; }
				if(trim($new_entry[4]) == "FREN"){ $dept = "French"; }
				if(trim($new_entry[4]) == "GEOG"){ $dept = "Geography"; }
				if(trim($new_entry[4]) == "GEOL"){ $dept = "Geology"; }
				if(trim($new_entry[4]) == "GERM"){ $dept = "German"; }
                if(trim($new_entry[4]) == "HIST"){ $dept = "History"; }
                if(trim($new_entry[4]) == "HLTH"){ $dept = "Health Science"; }
				if(trim($new_entry[4]) == "HMEC"){ $dept = "Home Economics"; }
				if(trim($new_entry[4]) == "HORT"){ $dept = "Horticulture"; }
				if(trim($new_entry[4]) == "HOSP"){ $dept = "Hospitality Management"; }
				if(trim($new_entry[4]) == "HUMA"){ $dept = "Humanities"; }
				if(trim($new_entry[4]) == "INDE"){ $dept = "Interior Design"; }
				if(trim($new_entry[4]) == "INFT"){ $dept = "Information Technology"; }
				if(trim($new_entry[4]) == "INS"){ $dept = "Insurance"; }
				if(trim($new_entry[4]) == "INST"){ $dept = "Independent Study"; }
				if(trim($new_entry[4]) == "ITHC"){ $dept = "InfoTech/Health Care"; }
				if(trim($new_entry[4]) == "JOUR"){ $dept = "Journalism"; }
				if(trim($new_entry[4]) == "LAW"){ $dept = "Criminology"; }
				if(trim($new_entry[4]) == "LIBS"){ $dept = "Orientation"; }
                if(trim($new_entry[4]) == "LITR"){ $dept = "Literacy Volunteer"; }
                if(trim($new_entry[4]) == "LTRE"){ $dept = "Literacy"; }
				if(trim($new_entry[4]) == "MACH"){ $dept = "Machine Processes"; }
				if(trim($new_entry[4]) == "MATH"){ $dept = "Mathematics"; }
				if(trim($new_entry[4]) == "MCOM"){ $dept = "Mass Communication"; }
				if(trim($new_entry[4]) == "MEET"){ $dept = "Meetings"; }
				if(trim($new_entry[4]) == "MTEC"){ $dept = "Mechanical Technology"; }
				if(trim($new_entry[4]) == "MUS"){ $dept = "Music"; }
				if(trim($new_entry[4]) == "NCRT"){ $dept = "Non Credit"; }
				if(trim($new_entry[4]) == "NET"){ $dept = "Nursing Entrance Test"; }
				if(trim($new_entry[4]) == "NSCI"){ $dept = "Natural Science"; }
				if(trim($new_entry[4]) == "NUR"){ $dept = "Hybrid Online Nursing"; }
				if(trim($new_entry[4]) == "NURS"){ $dept = "Nursing"; }
				if(trim($new_entry[4]) == "OCED"){ $dept = "Occupational Education"; }
				if(trim($new_entry[4]) == "OFFT"){ $dept = "Office Technology"; }
				if(trim($new_entry[4]) == "PERS"){ $dept = "Personal Development"; }
				if(trim($new_entry[4]) == "PHIL"){ $dept = "Philosophy"; }
				if(trim($new_entry[4]) == "PHYD"){ $dept = "Physical Education"; }
				if(trim($new_entry[4]) == "PHYS"){ $dept = "Physics"; }
				if(trim($new_entry[4]) == "PLAC"){ $dept = "Placement Test"; }
				if(trim($new_entry[4]) == "POL"){ $dept = "Political Science"; }
				if(trim($new_entry[4]) == "PSY"){ $dept = "Psychology"; }
				if(trim($new_entry[4]) == "RDG"){ $dept = "Reading"; }
				if(trim($new_entry[4]) == "RELS"){ $dept = "Real Estate"; }
				if(trim($new_entry[4]) == "RSVP"){ $dept = "RSVP"; }
				if(trim($new_entry[4]) == "RUSS"){ $dept = "Russian"; }
				if(trim($new_entry[4]) == "SMEN"){ $dept = "Small Engines"; }
				if(trim($new_entry[4]) == "SOCI"){ $dept = "Sociology"; }
				if(trim($new_entry[4]) == "SPAN"){ $dept = "Spanish"; }
				if(trim($new_entry[4]) == "SPCH"){ $dept = "Speech"; }
				if(trim($new_entry[4]) == "SPTP"){ $dept = "Special Topics"; }
				if(trim($new_entry[4]) == "TECH"){ $dept = "Technology"; }
				if(trim($new_entry[4]) == "THEA"){ $dept = "Theatre"; }
				if(trim($new_entry[4]) == "TRAN"){ $dept = "Transfer Courses"; }
				if(trim($new_entry[4]) == "TRCK"){ $dept = "Truck Driving"; }
				if(trim($new_entry[4]) == "TRCO"){ $dept = "Transfer Communications"; }
				if(trim($new_entry[4]) == "TRFA"){ $dept = "Transfer Fine Arts"; }
				if(trim($new_entry[4]) == "TRGE"){ $dept = "Transfer General Elective"; }
				if(trim($new_entry[4]) == "TRHU"){ $dept = "Transfer Humanities"; }
				if(trim($new_entry[4]) == "TRLS"){ $dept = "Transfer Life Science"; }
				if(trim($new_entry[4]) == "TRMA"){ $dept = "Transfer Mathematics"; }
				if(trim($new_entry[4]) == "TRPS"){ $dept = "Transfer Physical Science"; }
				if(trim($new_entry[4]) == "TRSS"){ $dept = "Transfer Social/Behav Science"; }
				if(trim($new_entry[4]) == "TUTR"){ $dept = "Tutors"; }
				if(trim($new_entry[4]) == "UPWD"){ $dept = "Upward Bound"; }
				if(trim($new_entry[4]) == "VOSK"){ $dept = "Vocational Skills"; }
				if(trim($new_entry[4]) == "WELD"){ $dept = "Welding"; }
				if(trim($new_entry[4]) == "WFD"){ $dept = "Workforce Development"; }
				if(trim($new_entry[4]) == "WTEC"){ $dept = "Wind Turbine Technician"; }
				wp_set_object_terms($insert_data, $dept, 'department', true);
			}
			if($new_entry[5]){ //No. --- Not entered yet ---
				update_post_meta($insert_data, $prefix.'course', trim($new_entry[5]));
			}
			if($new_entry[6]){ //SE --- Not entered yet ---
				update_post_meta($insert_data, $prefix.'section', trim($new_entry[6]));
			}
			/*if($new_entry[7]){ //Title --- Used to create Post ---
				update_post_meta($insert_data, $prefix.'mp_zip', trim($new_entry[7]));
			}*/
			if($new_entry[8]){ //Credit Hours
				update_post_meta($insert_data, $prefix.'credit_hours', trim($new_entry[8]));
			}
			if($new_entry[9]){ //Start Time
				update_post_meta($insert_data, $prefix.'class_start_time', trim($new_entry[9]));
			}
			if($new_entry[10]){ //End Time
				update_post_meta($insert_data, $prefix.'class_end_time', trim($new_entry[10]));
			}
			if($new_entry[11]){ //Days
				update_post_meta($insert_data, $prefix.'class_days', trim($new_entry[11]));
			}
			if($new_entry[12]){ //Instructor
				update_post_meta($insert_data, $prefix.'instructor', trim($new_entry[12]));
			}
			if($new_entry[13]){ //Location
				update_post_meta($insert_data, $prefix.'class_location', trim($new_entry[13]));
			}
			if($new_entry[14]){ //Start Date
				update_post_meta($insert_data, $prefix.'class_start_date', strtotime($new_entry[14]));
			}
			if($new_entry[15]){ //End Date
				update_post_meta($insert_data, $prefix.'class_end_date', strtotime($new_entry[15]));
			}
			if($new_entry[16]){ //Fee
				update_post_meta($insert_data, $prefix.'class_fee', trim($new_entry[16]));
			}
			if($new_entry[17]){ //
				/* Old campus row, retained in case it comes back.

					if(trim($new_entry[17]) == "A"){ $campus = "ABE/GED"; }
					if(trim($new_entry[17]) == "B"){ $campus = "Continuing Ed Dept/No tuition"; }
					if(trim($new_entry[17]) == "C"){ $campus = "On-campus Facility HCC/WDC"; }
					if(trim($new_entry[17]) == "D"){ $campus = "Workforce Development Center"; }
					if(trim($new_entry[17]) == "E"){ $campus = "East Dubuque Campus"; }
					if(trim($new_entry[17]) == "F"){ $campus = "Off-campus Facility"; }
					if(trim($new_entry[17]) == "G"){ $campus = "Continuing Education Dept"; }
					if(trim($new_entry[17]) == "H"){ $campus = "Hybrid/Home study/Telecourse"; }
					if(trim($new_entry[17]) == "I"){ $campus = "Interstate"; }
					if(trim($new_entry[17]) == "J"){ $campus = "Savanna Campus"; }
					if(trim($new_entry[17]) == "K"){ $campus = "Galena Campus"; }
					if(trim($new_entry[17]) == "L"){ $campus = "Learning Assistance Dept"; }
					if(trim($new_entry[17]) == "M"){ $campus = "Highland Management Institute"; }
					if(trim($new_entry[17]) == "N"){ $campus = "Natural Science and Health Div"; }
					if(trim($new_entry[17]) == "O"){ $campus = "Project Succeed"; }
					if(trim($new_entry[17]) == "P"){ $campus = "Physical Education Dept"; }
					if(trim($new_entry[17]) == "Q"){ $campus = "Western Ill Educ Consortuim"; }
					if(trim($new_entry[17]) == "R"){ $campus = "Humanities/SS no tuition"; }
					if(trim($new_entry[17]) == "S"){ $campus = "Humanities Social Science Div"; }
					if(trim($new_entry[17]) == "T"){ $campus = "Business and Technology Div"; }
					if(trim($new_entry[17]) == "U"){ $campus = "Upward Bound"; }
					if(trim($new_entry[17]) == "V"){ $campus = "Jo Daviess/Carroll Area Voc"; }
					if(trim($new_entry[17]) == "W"){ $campus = "Work Smart"; }
					if(trim($new_entry[17]) == "X"){ $campus = "Out-of-district/state facility"; }
					if(trim($new_entry[17]) == "Y"){ $campus = "Internet WIEC Courses"; }
					if(trim($new_entry[17]) == "Z"){ $campus = "Western Center Campus"; }
				*/
				if(trim($new_entry[17]) == "HB"){ $campus = "Hybrid Classes"; }
				if(trim($new_entry[17]) == "Y1"){ $campus = "Online Classes - Completely Online"; }
				if(trim($new_entry[17]) == "Y2"){ $campus = "Online Classes - May have one on-campus meeting"; }
				if(trim($new_entry[17]) == "C"){ $campus = "Freeport Main Campus"; }
                if(trim($new_entry[17]) == "DC"){ $campus = "Dual Credit Classes"; }
                if(trim($new_entry[17]) == "Z1"){ $campus = "Zoom Class - Completely Virtual"; }
                if(trim($new_entry[17]) == "Z2"){ $campus = "Zoom Class – virtual and on-campus meeting"; }
				update_post_meta($insert_data, $prefix.'campus', $campus);
				wp_set_object_terms($insert_data, $campus, 'location', true);
			}
			if($new_entry[18]){ //Semester
				wp_set_object_terms($insert_data, $new_entry[18], 'semester', true);
			}
			if($new_entry[19]){ //Lifelong Learning
				wp_set_object_terms($insert_data, $new_entry[19], 'lifelong_learning', true);
			}
			if($new_entry[20]){ //Time of Day (Day/Evening)
				wp_set_object_terms($insert_data, $new_entry[20], 'time_of_day', true);
			}
			if($new_entry[18] && $new_entry[3]){ //Semester && Course Number
				$trm = strtoupper(str_replace(' ', '+', $new_entry[18]));
				update_post_meta($insert_data, $prefix.'course_materials', 'http://bookstore.highland.edu/SelectCourses.aspx?src=2&type=2&stoid=99&trm='.$trm.'&cid='.$new_entry[3]);
			}
		}
	}
}