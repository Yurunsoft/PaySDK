<?php
/**
 * 微信支付授权码查询openid Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\AuthCodeToOpenid\Request;
$request->auth_code = '135016674681386920';
$result = $sdk->execute($request);
$openid = $result['openid'];
var_dump($result, $openid);