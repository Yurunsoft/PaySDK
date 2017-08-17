<?php
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayFTF\Params\PublicParams;
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayFTF\SDK($params);

$content = var_export($_POST, true) . PHP_EOL . 'verify:' . $pay->verifyCallback($_POST);

file_put_contents(__DIR__ . '/notify_result.txt', $content);

echo 'success';