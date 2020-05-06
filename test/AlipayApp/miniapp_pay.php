<?php
/**
 * 小程序支付Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayApp\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// 公钥证书演示
// $params->usePublicKeyCert = true;
// $params->alipayCertPath = __DIR__ . '/cert/alipayCertPublicKey_RSA2.crt';
// $params->alipayRootCertPath = __DIR__ . '/cert/alipayRootCert.crt';
// $params->merchantCertPath = __DIR__ . '/cert/appCertPublicKey_2016073000123475.crt';

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayApp\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayApp\MiniApp\Params\Pay\Request;
$request->notify_url = $GLOBALS['PAY_CONFIG']['notify_url']; // 支付后通知地址（作为支付成功回调，这个可靠）
$request->businessParams->out_trade_no = 'test' . mt_rand(10000000,99999999); // 商户订单号
$request->businessParams->total_amount = 9000000; // 价格
// 买家用户号需要授权，请用：https://github.com/Yurunsoft/YurunOAuthLogin
$request->businessParams->buyer_id = '2088xxxxx'; // 传入买家的支付宝唯一用户号（2088开头的16位纯数字）
$request->businessParams->subject = '小米手机9黑色陶瓷尊享版'; // 商品标题

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
