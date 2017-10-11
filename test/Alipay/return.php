<?php
/**
 * 支付宝回调Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Alipay\Params\PublicParams;
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Alipay\SDK($params);

var_dump('返回参数', $_GET);
var_dump('verify:', $pay->verifyCallback($_GET));