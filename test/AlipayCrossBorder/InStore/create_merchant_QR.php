<?php
/**
 * 支付宝 Cross-border In-Store Payment - Merchant QR Code Payment - 创建商户二维码 Demo.
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
$request = new \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateMerchantQR\Request();
$request->notify_url = $GLOBALS['PAY_CONFIG']['notify_url'];
$request->biz_data->secondary_merchant_industry = '5812';
$request->biz_data->secondary_merchant_id = 'x001';
$request->biz_data->secondary_merchant_name = 'xxxStore';
$request->biz_data->store_id = 'x0001';
$request->biz_data->store_name = 'xxxxStore';
$request->biz_data->trans_currency = 'USD';
$request->biz_data->currency = 'USD';
// 下面两个参数在沙箱环境下传了就出错，生产环境可以传
// $request->biz_data->country_code = 'CN';
// $request->biz_data->address = 'wc';

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
