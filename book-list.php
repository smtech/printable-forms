<?php
	
require_once('common.inc.php');

/**
 * Converts $title to Title Case, and returns the result
 *
 * @param string $title
 *
 * @return string
 *
 * @see http://www.sitepoint.com/title-case-in-php/ SitePoint
 **/
function strtotitle($title) {

	/* Our array of 'small words' which shouldn't be capitalised if they aren't the first word.  Add your own words to taste. */
	$smallwordsarray = array(
		'of','a','the','and','an','or','nor','but','is','if','then','else','when',
		'at','from','by','on','off','for','in','out','over','to','into','with'
	);
	
	$bigwordsarray = array(
		'i', 'ii', 'iii', 'iv', 'v', 'vi'	
	);
	
	$title = preg_replace('/([^a-z0-9])\s*/i', '$1 ', strtolower($title));
	
	/* Split the string into separate words */
	$words = explode(' ', $title);
	
	foreach ($words as $key => $word) {
		
		if (in_array($word, $bigwordsarray)) {
			$words[$key] = strtoupper($word);
		} elseif ($key == 0 or !in_array($word, $smallwordsarray)) {
			$words[$key] = ucwords($word);
		}
	}
	
	/* Join the words back into a string */
	$newtitle = implode(' ', $words);
	
	return $newtitle;
}

$smarty->enable(StMarksSmarty::MODULE_DATEPICKER);

if(empty($_FILES['csv'])) {
	$smarty->display('book-list/upload.tpl');
	exit;
} else {
	$data = loadCsvToArray('csv');
	if ($data == false) {
		$smarty->addMessage('Missing File', 'You need to upload a CSV file for this to work!', NotificationMessage::ERROR);
		$smarty->display('book-list/upload.tpl');
		exit;
	}
	
	$sections = array();
	$section = array();
	$section['metadata']['id'] = '';
	foreach ($data as $d) {
		if ($d['CourseID'] != $section['metadata']['id']) {
			if (!empty($section['metadata']['id'])) {
				$sections[$section['metadata']['id']] = $section;
			}
			$section = array();
			$section['metadata']['id'] = preg_replace('/[^a-z0-9\-]+/i', '', $d['CourseID']);
			foreach ($d as $column => $value) {
				switch ($column) {
					case 'ClassName': {
						$section['metadata']['name'] = strtotitle($value);
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
	
	$smarty->assign('teacherDeadline', date('l, F j', strtotime($_REQUEST['teacher-deadline'])));
	$smarty->assign('deptDeadline', date('l, F j', strtotime($_REQUEST['dept-deadline'])));
	$smarty->assign('blanks', (isset($_REQUEST['blanks']) ? $_REQUEST['blanks'] : 0));
	$smarty->assign('sections', $sections);
	$smarty->display('book-list/sheet.tpl');
}
?>