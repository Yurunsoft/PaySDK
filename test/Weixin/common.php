<?php
require dirname(__DIR__) . '/common.php';
$GLOBALS['PAY_CONFIG'] = array(
	'appid'			=>	'wx73c087db4b214364',
	'mch_id'		=>	'1399176702',
	'key'			=>	'hgfr125vfg52f145f254g1231fg45frt',
	'pay_notify_url'	=>	'http://yurun2.test.96007.cc/test/Weixin/pay_notify.php',
	'certPath'	=>	__DIR__ . '/cert/apiclient_cert.pem',
	'keyPath'	=>	__DIR__ . '/cert/apiclient_key.pem',
);