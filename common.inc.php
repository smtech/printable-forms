<?php

require_once('vendor/autoload.php');

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