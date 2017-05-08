<?php

require_once 'common.inc.php';

$token = false;
if (isset($_REQUEST['embed'])) {
    preg_match('/token=(.*)[&"]/', $_REQUEST['embed'], $match);
    $token = $match[1];
}

if (empty($token)) {
    $smarty->display('remind.com/instructions.tpl');
} else {
    $smarty->assign('token', $token);
    $smarty->display('remind.com/embed-code.tpl');
}
