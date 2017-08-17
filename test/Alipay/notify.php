<?php
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Alipay\Params\PublicParams;
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Alipay\SDK($params);

$content = var_export($_POST, true) . PHP_EOL . 'verify:' . $pay->verifyCallback($_POST);

file_put_contents(__DIR__ . '/notify_result.txt', $content);

echo 'success';