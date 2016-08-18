<?php

require_once('common.inc.php');

use Battis\DataUtilities;

$smarty->enable(StMarksSmarty::MODULE_DATEPICKER);

if (empty($_FILES['csv'])) {
    $smarty->display('book-list/upload.tpl');
    exit;
} else {
    $data = DataUtilities::loadCsvToArray('csv');
    if ($data == false) {
        $smarty->addMessage(
            'Missing File',
            'You need to upload a CSV file for this to work!',
            NotificationMessage::DANGER
        );
        $smarty->display('book-list/upload.tpl');
        exit;
    }

    $sections = array();
    $section['metadata']['id'] = false;
    foreach ($data as $d) {
        if ($d['CourseID'] != $section['metadata']['id']) {
            if ($section['metadata']['id']) {
                $section['metadata']['id'] = preg_replace('/[^a-z0-9\-]+/i', '', $section['metadata']['id']);
                $sections[$section['metadata']['id']] = $section;
            }
            $section = array();
            $section['metadata']['id'] = $d['CourseID'];
            foreach ($d as $column => $value) {
                switch ($column) {
                    case 'ClassName':
                        $section['metadata']['name'] = DataUtilities::titleCase($value);
                        break;

                    case 'TeacherName':
                        $section['metadata']['teacher'] = $value;
                        break;

                    default:
                        if (preg_match('/Book\d+/', $column)) {
                            if (!empty($value)) {
                                $section['books'][] = DataUtilities::titleCase($value);
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
