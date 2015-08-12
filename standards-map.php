<?php

require_once('common.inc.php');

$smarty->addStylesheet('stylesheets/standards-map.css');

if (isset($_FILES['csv'])) {
	$file = fopen($_FILES['csv']['tmp_name'], 'r');
	$standards = array();
	$map = array();
	$i = 0;
	while($row = fgetcsv($file)) {
		$i++;
		if (!empty($row)) {
			switch ($i) {
				case 1: {
					$smarty->assign('dept', $row[0]);
					break;
				}
				case 2: {
					$smarty->assign('courses', array_slice($row, 2));
					break;
				}
				default: {
					$standard = explode(' - ', $row[0]);
					$row[0] = $standard[0];
					$row[1] = $standard[1];
					$map[] = $row;
				}
			}
		}
	}
	fclose($file);
	$smarty->assign('standards', $standards);
	$smarty->assign('map', $map);
	$smarty->display('standards-map.tpl');
} else {
	$smarty->assign('formAction', $_SERVER['PHP_SELF']);
	$smarty->display('standards-map-upload.tpl');
}
	
?>