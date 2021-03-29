<?php
/**
 * 支付宝手机网站支付Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Alipay\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];
// $params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Alipay\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\Alipay\Params\WapPay\Request();
$request->notify_url = $GLOBALS['PAY_CONFIG']['notify_url']; // 支付后通知地址（作为支付成功回调，这个可靠）
$request->return_url = $GLOBALS['PAY_CONFIG']['return_url']; // 支付后跳转返回地址
$request->businessParams->seller_id = $GLOBALS['PAY_CONFIG']['appid']; // 卖家支付宝用户号
$request->businessParams->out_trade_no = 'test' . mt_rand(10000000, 99999999); // 商户订单号
$request->businessParams->total_fee = 0.01; // 价格
$request->businessParams->subject = '测试商品'; // 商品标题
$request->businessParams->show_url = 'http://www.yurunsoft.com'; // 用户付款中途退出返回商户网站的地址。

// 跳转到支付页面
// $pay->redirectExecute($request);

// 获取跳转url
$pay->prepareExecute($request, $url);
var_dump($url);
