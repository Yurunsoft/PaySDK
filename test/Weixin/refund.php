<?php
/**
 * 微信支付申请退款Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];
$params->certPath = $GLOBALS['PAY_CONFIG']['certPath'];
$params->keyPath = $GLOBALS['PAY_CONFIG']['keyPath'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\Refund\Request();
$request->transaction_id = '4004612001201709121684151520'; // 微信订单号，与商户订单号二选一
$request->out_refund_no = 'refund' . mt_rand(10000000, 99999999); // 商户退款单号
$request->total_fee = 1; // 订单总金额，单位为分，只能为整数
$request->refund_fee = 1; // 退款总金额，订单总金额，单位为分，只能为整数

$result = $sdk->execute($request);

var_dump('result:', $result);

var_dump('success:', $sdk->checkResult());

var_dump('error:', $sdk->getError(), 'error_code:', $sdk->getErrorCode());
