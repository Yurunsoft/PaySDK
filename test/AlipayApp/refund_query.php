<?php
/**
 * 支付宝统一收单交易退款查询Demo
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
$request = new \Yurun\PaySDK\AlipayApp\Params\RefundQuery\Request;
$request->businessParams->trade_no = '';
$request->businessParams->out_trade_no = '';
$request->businessParams->out_request_no = '';

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
