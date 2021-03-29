<?php

require dirname(__DIR__, 2) . '/common.php';
$GLOBALS['PAY_CONFIG'] = [
    'appid'			    => '',
    'notify_url'	 => 'http://yurun.test.com/test/AlipayCrossBorder/Online/notify.php',
    'return_url'	 => 'http://yurun.test.com/test/AlipayCrossBorder/Online/return.php',
    'publicKey'		 => '',
    'privateKey'	 => '',
    'md5Key'		    => '',
];
