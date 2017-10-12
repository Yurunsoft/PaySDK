<?php
/**
 * 微信扫码支付（模式一）Demo
 */
require dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Weixin\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\Weixin\Native\Params\Pay\Mode1Request;
$request->product_id = 'test99999999';

// 调用接口
$pay->prepareExecute($request, $url);
var_dump('qrcode：', $url);

// 转短地址
$request = new \Yurun\PaySDK\Weixin\Shorturl\Request;
$request->long_url = $url;
$result = $pay->execute($request);
$shortUrl = $result['short_url'];
var_dump($result, $shortUrl);