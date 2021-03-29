<?php
/**
 * 微信支付拉取订单评价数据Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];
$params->certPath = $GLOBALS['PAY_CONFIG']['certPath'];
$params->keyPath = $GLOBALS['PAY_CONFIG']['keyPath'];
$params->sign_type = 'HMAC-SHA256'; // 这个接口必须用SHA256

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\QueryComment\Request();
$request->begin_time = '20170913000000';
$request->end_time = '20170913150000';

// 下载对账单成功时候返回csv格式数据，失败返回xml数据，请自行判断是否成功
var_dump($sdk->execute($request, ''));
