<?php

require_once('common.inc.php');

$cache = new Battis\SimpleCache($sql, basename(__FILE__, '.php'));
$cache->setLifetime(Battis\SimpleCache::IMMORTAL_LIFETIME);

/* have we been given a map ID to generate from cached data? */
if (!empty($_REQUEST['map'])) {
	$courses = array();
	$map = array();
	$level = array();
	$standard = '';
	$dom = DOMDocument::loadHTML(
		tidy_parse_string(
			$cache->getCache($_REQUEST['map']),
			array('output-xhtml' => true)
		)
	);
	$xpath = new DOMXpath($dom);
	$parsingCourses = 0;
	foreach($xpath->query("//tr[@class[contains(.,'stds')]]") as $node) {
		$nextStandard = $xpath->query(".//th[@class[contains(.,'hier')]]", $node);
		$nextStandard = trim($nextStandard->length > 0 ? $nextStandard->item(0)->nodeValue: false);

		$course = $xpath->query(".//th[@class='rowgrouplabel']", $node);
		$course = trim($course->length > 0 ? $course->item(0)->nodeValue : false);
		
		$total = $xpath->query(".//span[@class='spanLevelMatches']", $node);
		$total = trim($total->length > 0 ? $total->item(0)->nodeValue : false);
		if ($parsingCourses !== false) {
			if($nextStandard && $parsingCourses == 1) {
				$parsingCourses = false;
				$standard = $nextStandard;
			} elseif ($nextStandard) {
				$smarty->assign('standards', $nextStandard);
				$parsingCourses++;
			} elseif ($course) {
				$courses[] = $course;
			}	
		} else {
			if ($nextStandard) {
				$map[] = array('standard' => array_combine(array('code', 'description'), explode(' - ', $standard)), "marks" => $level);
				$level = array();
				$standard = $nextStandard;
			} else {
				if ($total !== false && !empty($course)) {
					$level[$course] = $total;
				}
			}
		}
	}
	$map[] = array('standard' => array_combine(array('code', 'description'), explode(' - ', $standard)), "marks" => $level);
	
	$smarty->assign('courses', $courses);
	$smarty->assign('map', $map);
	
	$smarty->display('standards-map.tpl');
	exit;
	
/* ...or are we being given data to cache? */
} elseif (!empty($_REQUEST['analysis'])) {

	/* allow access via bookmarklet */
	header('Access-Control-Allow-Origin: http://hosting.curricuplan.com');

	/* the POST parameter is not URL-encoded, which breaks $_POST */
	$data = substr(file_get_contents('php://input'), strlen('analysis='));
	$key = 'analysis.' . md5($data);
	$cache->setCache($key, $data);
	echo $key;
	exit;
	
/* ...or should we show some instructions? */
} else {
	$smarty->addStylesheet('stylesheets/standards-map-instructions.css');
	$smarty->assign('bookmarklet', "javascript: (function () { 
    var jsCode = document.createElement('script'); 
    jsCode.setAttribute('src', 'https://skunkworks.stmarksschool.org/printable-forms/standards-map.js');                  
  document.body.appendChild(jsCode); 
 }());");
	$smarty->display('standards-map-instructions.tpl');
}
	
?>