<?php

require_once('common.inc.php');

$cache = new Battis\SimpleCache($sql, basename(__FILE__, '.php'));
$cache->setLifetime(Battis\SimpleCache::IMMORTAL_LIFETIME);

/* have we been given a map ID to generate from cached data? */
if (!empty($_REQUEST['map'])) {

	/* initialize our containers empty */
	$courses = array();
	$map = array();
	$level = array();
	
	/* parse the HTML we've cached */
	$dom = DOMDocument::loadHTML(
		tidy_parse_string(
			$cache->getCache($_REQUEST['map']),
			array('output-xhtml' => true)
		)
	);
	
	/* walk through the parsed html, table row by table row */
	$xpath = new DOMXpath($dom);
	$parsingCourses = 0;
	$standard = '';
	foreach($xpath->query("//tr[@class[contains(.,'stds')]]") as $node) {
		
		/* pull out standards and courses at that standard level and their coverage of that standard */
		$nextStandard = $xpath->query(".//th[@class[contains(.,'hier')]]", $node);
		$nextStandard = trim($nextStandard->length > 0 ? $nextStandard->item(0)->nodeValue: false);

		$course = $xpath->query(".//th[@class='rowgrouplabel']", $node);
		$course = trim($course->length > 0 ? $course->item(0)->nodeValue : false);
		
		$total = $xpath->query(".//span[@class='spanLevelMatches']", $node);
		$total = trim($total->length > 0 ? $total->item(0)->nodeValue : false);
		
		/* if we're still parsing courses (between standard title and first standard group)... */
		if ($parsingCourses !== false) {
			
			/* ...continue until we hit the first standard group */
			if($nextStandard && $parsingCourses == 1) {
				$parsingCourses = false;
				$standard = $nextStandard;
			} elseif ($nextStandard) {
				$smarty->assign('title', $nextStandard);
				$parsingCourses++;
				
			/* ...adding courses to our list */
			} elseif ($course) {
				$courses[] = $course;
			}	
		
		/* otherwise, start building the map of standards vs. courses */
		} else {
			if ($nextStandard) {
				$map[] = array('standard' => array_combine(array('code', 'description'), explode(' - ', $standard)), "marks" => $level);
				$level = array();
				$standard = $nextStandard;
			} else {
				if ($total !== false && !empty($course)) {
					$level[] = $total;
				}
			}
		}
	}
	$map[] = array('standard' => array_combine(array('code', 'description'), explode(' - ', $standard)), "marks" => $level);
	
	/* and send it off to Smarty to display */
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