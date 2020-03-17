<?php
/**
 * 微信支付-企业付款到银行卡Demo
 */
require_once dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];
$params->certPath = $GLOBALS['PAY_CONFIG']['certPath'];
$params->keyPath = $GLOBALS['PAY_CONFIG']['keyPath'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\CompanyPay\Bank\Pay\Request;
$certFile = dirname(__DIR__) . '/cert/weixin-rsa-public.pem';
// $request->rsaPublicCertFile = $certFile; // 设置证书路径，用于加密银行卡号、姓名、开户行
$request->rsaPublicCertContent = file_get_contents($certFile); // 也可以直接赋值内容
$request->partner_trade_no = 'test' . mt_rand(10000000,99999999); // 订单号
$request->enc_bank_no = '银行卡号';
$request->enc_true_name = '姓名';
$request->bank_code = '银行代码';
$request->amount = 1;
$request->desc = '测试';

$result = $sdk->execute($request);

var_dump('result:', $result);

var_dump('success:', $sdk->checkResult());

var_dump('error:', $sdk->getError(), 'error_code:', $sdk->getErrorCode(), $sdk->requestData);