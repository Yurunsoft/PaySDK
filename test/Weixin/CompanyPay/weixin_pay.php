<?php
/**
 * 微信支付-企业付款Demo.
 */
require dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];
$params->certPath = $GLOBALS['PAY_CONFIG']['certPath'];
$params->keyPath = $GLOBALS['PAY_CONFIG']['keyPath'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\CompanyPay\Weixin\Pay\Request();
$request->partner_trade_no = 'test' . mt_rand(10000000, 99999999); // 订单号
$request->openid = 'opWUlwsi_2Yy9ScbM9EdSJCxY-QA';
$request->check_name = 'NO_CHECK';
$request->amount = 1;
$request->desc = '测试';
$request->spbill_create_ip = '127.0.0.1';

$result = $sdk->execute($request);

var_dump('result:', $result);

var_dump('success:', $sdk->checkResult());

var_dump('error:', $sdk->getError(), 'error_code:', $sdk->getErrorCode());
