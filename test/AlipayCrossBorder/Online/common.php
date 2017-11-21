<?php
require dirname(dirname(__DIR__)) . '/common.php';
$GLOBALS['PAY_CONFIG'] = array(
	'appid'			=>	'',
	'notify_url'	=>	'http://yurun.test.com/test/AlipayCrossBorder/Online/notify.php',
	'return_url'	=>	'http://yurun.test.com/test/AlipayCrossBorder/Online/return.php',
	'publicKey'		=>	'',
	'privateKey'	=>	'',
	'md5Key'		=>	'',
);