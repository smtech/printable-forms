<?php

require_once 'common.inc.php';

$token = false;
$join = false;
$height = 450;
if (isset($_REQUEST['embed'])) {
    preg_match_all('/(token=([a-f0-9]{32,32})|join=(true|false)|height=(\d+))/', $_REQUEST['embed'], $match);
    $token = $match[2][0];
    $join = $match[3][2];
    $height = $match[4][1];
}

if (empty($token)) {
    $smarty->display('remind.com/instructions.tpl');
} else {
    $smarty->assign([
        'token' => $token,
        'join' => $join,
        'height' => $height
    ]);
    $smarty->display('remind.com/embed-code.tpl');
}
