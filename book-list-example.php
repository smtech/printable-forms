<?php

require_once 'common.inc.php';

use Battis\DataUtilities;

$data = [
    [
        'CourseID' => 'AR-10A-1',
        'ClassName' => 'Studio I',
        'TeacherName' => 'Ms. Barbara P. Putnam',
        'StudentName' => 'Joseph Burnett',
        'Book1' => 'Sketch Pads',
        'init1' => '',
        'Book2' => 'Felt pens',
        'init2' => '',
        'Book3' => '',
        'init3' => '',
        'Book4' => '',
        'init4' => '',
        'Book5' => '',
        'init5' => '',
        'Book6' => '',
        'init6' => '',
        'Book7' => '',
        'init7' => ''
    ],
    [
        'CourseID' => 'AR-10A-1',
        'ClassName' => 'Studio I',
        'TeacherName' => 'Ms. Barbara P. Putnam',
        'StudentName' => 'Bill Glavin',
        'Book1' => 'Sketch Pads',
        'init1' => '',
        'Book2' => 'Felt pens',
        'init2' => '',
        'Book3' => '',
        'init3' => '',
        'Book4' => '',
        'init4' => '',
        'Book5' => '',
        'init5' => '',
        'Book6' => '',
        'init6' => '',
        'Book7' => '',
        'init7' => ''
    ],
    [
        'CourseID' => 'AR-10A-1',
        'ClassName' => 'Studio I',
        'TeacherName' => 'Ms. Barbara P. Putnam',
        'StudentName' => 'Anna Pliscz',
        'Book1' => 'Sketch Pads',
        'init1' => '',
        'Book2' => 'Felt pens',
        'init2' => '',
        'Book3' => '',
        'init3' => '',
        'Book4' => '',
        'init4' => '',
        'Book5' => '',
        'init5' => '',
        'Book6' => '',
        'init6' => '',
        'Book7' => '',
        'init7' => ''
    ]
];

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

$smarty->assign('teacherDeadline', date('l, F j', strtotime("Saturday, September 10, 2016")));
$smarty->assign('deptDeadline', date('l, F j', strtotime("Monday, September 12, 2016")));
$smarty->assign('blanks', 3);
$smarty->assign('sections', $sections);
$smarty->display('book-list/sheet.tpl');
