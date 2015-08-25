<?php

require_once('vendor/autoload.php');

/**
 * Load an uploaded CSV file into an associative array
 *
 * @param string $field Field name holding the file name
 * @param boolean $firstRowLabels (Optional) Default `TRUE`
 *
 * @return string[][]|boolean A two-dimensional array of string values, if the
 *		`$field` contains a CSV file, `FALSE` if there is no file
 **/
function loadCsvToArray($field, $firstRowLabels = true) {
	$result = false;
	if(!empty($_FILES[$field]['tmp_name'])) {

		/* open the file for reading */
		$csv = fopen($_FILES[$field]['tmp_name'], 'r');
		$result = array();
		
		/* treat the first row as column labels */
		if ($firstRowLabels) {
			$fields = fgetcsv($csv);
		}
		
		/* walk through the file, storing each row in the array */
		while($csvRow = fgetcsv($csv)) {
			$row = array();
			
			/* if we have column labels, use them */
			if ($firstRowLabels) {
				foreach ($fields as $i => $field) {
					if (isset($csvRow[$i])) {
						$row[$field] = $csvRow[$i];
					}
				}
			} else {
				$row = $csvRow;
			}
			
			/* append the row to the array */
			$result[] = $row;
		}
		fclose($csv);
	}
	return $result;
}

/**
 * Preformat `var_dump()`
 *
 * @param mixed $var
 *
 * @return void
 **/
function html_var_dump($var) {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}


$smarty = StMarksSmarty::getSmarty();
$smarty->addTemplateDir(__DIR__ . '/templates');
$smarty->assign('category', 'Printable Forms');
$smarty->assign('formAction', $_SERVER['PHP_SELF']);

$secrets = simplexml_load_string(file_get_contents(realpath(__DIR__  . '/secrets.xml')));

$sql = new mysqli((string) $secrets->mysql->host, (string) $secrets->mysql->username, (string) $secrets->mysql->password, (string) $secrets->mysql->database);

?>