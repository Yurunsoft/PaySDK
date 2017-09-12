<?php
require dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Weixin\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\Weixin\Micropay\Params\Pay\Request;
$request->body = 'test';
$request->out_trade_no = 'test' . mt_rand(10000000,99999999);
$request->auth_code = '134995699305623538';
$request->total_fee = 1;
$request->spbill_create_ip = '127.0.0.1';

// 调用接口
var_dump($pay->execute($request));