<?php
/**
 * 支付宝 单笔转账到支付宝账户接口 Demo.
 */
require dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayApp\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayApp\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayApp\Fund\Transfer\Request();
$request->businessParams->out_biz_no = 'test' . mt_rand(10000000, 99999999);
$request->businessParams->payee_type = 'ALIPAY_LOGONID';
$request->businessParams->payee_account = 'hsejwc5627@sandbox.com';
$request->businessParams->amount = '0.01';

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
