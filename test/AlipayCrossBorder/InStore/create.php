<?php
/**
 * 支付宝 Cross-border In-Store Payment - Third-party Merchant QR Code Payment - 创建二维码 Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayCrossBorder\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];
// $params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayCrossBorder\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateQR\Request;
$request->notify_url = $GLOBALS['PAY_CONFIG']['notify_url'];
$request->out_trade_no = 'test' . mt_rand(10000000,99999999); // 商户订单号
$request->subject = '测试商品'; // 商品标题
$request->total_fee = 0.01; // 价格
$request->seller_id = $GLOBALS['PAY_CONFIG']['appid'];
$request->buyer_id = '2088622887298635';
$request->currency = 'USD';
$request->trans_currency = 'USD';
$request->extend_params->secondary_merchant_id = '1';
$request->extend_params->secondary_merchant_industry = '2';
$request->extend_params->secondary_merchant_name = '3';
$request->extend_params->store_id = '4';
$request->extend_params->store_name = '5';

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());

