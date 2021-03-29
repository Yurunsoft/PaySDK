<?php

require dirname(__DIR__) . '/common.php';
$GLOBALS['PAY_CONFIG'] = [
    'appid'			    => '',
    'notify_url'	 => 'http://yurun.test.com/test/Alipay/notify.php',
    'return_url'	 => 'http://yurun.test.com/test/Alipay/return.php',
    'publicKey'	  => '',
    'privateKey'	 => '',
    'md5Key'		    => '',
];
