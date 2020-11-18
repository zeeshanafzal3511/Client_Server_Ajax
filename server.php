<?php
if (isset($_POST)) {
		$student_data = $_POST['student_details'];

	if (empty($student_data)) {
		$response['message'] = 'Please fill out all fields';
		$response['status'] = false;
	}
	else{
		$response = array();
		$response['max_sub_name'] = array_search(max($student_data), $student_data);
		$response['min_sub_name'] = array_search(min($student_data), $student_data);
		$response['min_marks'] = min($student_data);
		$response['max_marks'] = max($student_data);
			$total_marks = count($student_data) * 100;
			$obtained_marks = 0;
		foreach ($student_data as $subjects => $marks) {
				$obtained_marks += $marks;
		}
		$percentage = $obtained_marks/$total_marks * 100;
		$response['percentage'] = $percentage;
		$response['status'] = true;

	}
	
	echo json_encode($response);
    die();
}