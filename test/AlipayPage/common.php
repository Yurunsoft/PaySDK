<?php
require dirname(__DIR__) . '/common.php';
$GLOBALS['PAY_CONFIG'] = array(
	'appid'			=>	'',
	'notify_url'	=>	'http://yurun.test.com/test/AlipayPage/notify.php',
	'return_url'	=>	'http://yurun.test.com/test/AlipayPage/return.php',
	'publicKey'	=>	'',
	'privateKey'	=>	'',
);