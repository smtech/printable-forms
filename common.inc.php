<?php

require_once('vendor/autoload.php');

use Battis\ConfigXML;

$smarty = StMarksSmarty::getSmarty();
$smarty->prependTemplateDir(__DIR__ . '/templates', basename(__DIR__));
$smarty->assign([
    'title' => 'Printable Forms',
    'category' => 'Printable Forms',
    'formAction'=> $_SERVER['PHP_SELF']
]);

$secrets = simplexml_load_string(file_get_contents(realpath(__DIR__  . '/secrets.xml')));

$sql = (new ConfigXML(__DIR__ . '/config.xml'))->newInstanceOf(mysqli::class, '/config/mysql');
