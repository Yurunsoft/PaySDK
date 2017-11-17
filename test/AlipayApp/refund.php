<?php
/**
 * 支付宝交易退款Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayApp\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayApp\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayApp\Params\Refund\Request;
$request->notify_url = $GLOBALS['PAY_CONFIG']['notify_url']; // 支付后通知地址（作为支付成功回调，这个可靠）
$request->return_url = $GLOBALS['PAY_CONFIG']['return_url']; // 支付后跳转返回地址
$request->businessParams->out_trade_no = 'test62025749'; // 订单支付时传入的商户订单号,和支付宝交易号不能同时为空。
$request->businessParams->trade_no = ''; // 支付宝交易号，和商户订单号不能同时为空
$request->businessParams->refund_amount = '0.01'; // 需要退款的金额，该金额不能大于订单金额,单位为元，支持两位小数
$request->businessParams->refund_reason = '退款原因，可以不写';

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
