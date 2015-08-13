<?php

require_once('vendor/autoload.php');

$smarty = StMarksSmarty::getSmarty();
$smarty->addTemplateDir(__DIR__ . '/templates');

$secrets = simplexml_load_string(file_get_contents(realpath(__DIR__  . '/secrets.xml')));

$sql = new mysqli((string) $secrets->mysql->host, (string) $secrets->mysql->username, (string) $secrets->mysql->password, (string) $secrets->mysql->database);

function html_var_dump($var) {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

?>