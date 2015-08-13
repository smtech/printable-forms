<?php
	
require_once('common.inc.php');

if(empty($_FILES['csv'])) {
	$smarty->assign('formAction', $_SERVER['PHP_SELF']);
	$smarty->display('book-list-upload.tpl');
	exit;
} else {
	$file = fopen($_FILES['csv']['tmp_name'], 'r');
	$columns = fgetcsv($file);
	$data = array();
	while($row = fgetcsv($file)) {
		if (!empty($row)) {
			$data[] = array_combine($columns, $row);
		}
	}
	fclose($file);
	
	$sections = array();
	$section = array();
	$section['metadata']['id'] = '';
	foreach ($data as $d) {
		if ($d['CourseID'] != $section['metadata']['id']) {
			if (!empty($section['metadata']['id'])) {
				$sections[$section['metadata']['id']] = $section;
			}
			$section = array();
			$section['metadata']['id'] = $d['CourseID'];
			foreach ($d as $column => $value) {
				switch ($column) {
					case 'ClassName': {
						$section['metadata']['name'] = $value;
						break;
					}
					case 'TeacherName': {
						$section['metadata']['teacher'] = $value;
						break;
					}
					default: {
						if (preg_match('/Book\d+/', $column)) {
							if (!empty($value)) {
								$section['books'][] = $value;
							}
						}
					}
				}
			}
		}
		$section['students'][] = $d['StudentName'];
	}		
	if (!empty($section['metadata']['id'])) {
		$sections[$section['metadata']['id']] = $section;
	}

	$smarty->assign('blanks', (isset($_REQUEST['blanks']) ? $_REQUEST['blanks'] : 0));
	$smarty->assign('sections', $sections);
	$smarty->display('book-list.tpl');
}
?>