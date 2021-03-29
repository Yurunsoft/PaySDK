<?php
/**
 * 支付宝 Cross-border In-Store Payment - Barcode Payment - 支付 Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayCrossBorder\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];
// $params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayCrossBorder\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayCrossBorder\InStore\BarcodePay\Request();
$request->alipay_seller_id = $GLOBALS['PAY_CONFIG']['appid'];
$request->quantity = 1;
$request->trans_name = '测试商品'; // 商品名称
$request->partner_trans_id = 'test' . mt_rand(10000000, 99999999); // 商户订单号
$request->currency = 'USD';
$request->trans_amount = 0.01; // 价格
$request->buyer_identity_code = '285902802486590277'; // 付款码
$request->identity_code_type = 'barcode'; // QRcode 或 barcode
$request->memo = '备注';
$request->extend_info->secondary_merchant_name = '某某小店';
$request->extend_info->secondary_merchant_id = '001';
$request->extend_info->secondary_merchant_industry = '5812';

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
