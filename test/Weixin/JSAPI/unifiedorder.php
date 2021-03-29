<?php
/**
 * 微信公众号支付Demo.
 */
require dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Weixin\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\Weixin\JSAPI\Params\Pay\Request();
$request->body = 'test'; // 商品描述
$request->out_trade_no = 'test' . mt_rand(10000000, 99999999); // 订单号
$request->total_fee = 1; // 订单总金额，单位为：分
$request->spbill_create_ip = '127.0.0.1'; // 客户端ip
$request->notify_url = $GLOBALS['PAY_CONFIG']['pay_notify_url']; // 异步通知地址
$request->openid = 'opWUlwsi_2Yy9ScbM9EdSJCxY-QA'; // 必须设置openid

// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());

if ($pay->checkResult())
{
    $request = new \Yurun\PaySDK\Weixin\JSAPI\Params\JSParams\Request();
    $request->prepay_id = $result['prepay_id'];
    $jsapiParams = $pay->execute($request);
    // 最后需要将数据传给js，使用WeixinJSBridge进行支付
    echo json_encode($jsapiParams);
}
