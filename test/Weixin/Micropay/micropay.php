<?php
/**
 * 微信刷卡支付Demo.
 */
require dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Weixin\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\Weixin\Micropay\Params\Pay\Request();
$request->body = 'test'; // 商品描述
$request->out_trade_no = 'test' . mt_rand(10000000, 99999999); // 订单号
$request->auth_code = '134995699305623538'; // 扫描到用户的条形码
$request->total_fee = 1; // 订单总金额，单位为：分
$request->spbill_create_ip = '127.0.0.1'; // 客户端ip

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
