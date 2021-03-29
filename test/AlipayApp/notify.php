<?php
/**
 * 支付宝即时到账异步通知Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayApp\Params\PublicParams();
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayApp\SDK($params);

$content = var_export($_POST, true) . \PHP_EOL . 'verify:' . var_export($pay->verifyCallback($_POST), true);

file_put_contents(__DIR__ . '/notify_result.txt', $content);

echo 'success';
