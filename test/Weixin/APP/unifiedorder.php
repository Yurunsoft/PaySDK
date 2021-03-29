<?php
/**
 * 微信APP下单Demo.
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
$request = new \Yurun\PaySDK\Weixin\APP\Params\Pay\Request();
$request->body = 'test'; // 商品描述
$request->out_trade_no = 'test' . mt_rand(10000000, 99999999); // 订单号
$request->total_fee = 1; // 订单总金额，单位为：分
$request->spbill_create_ip = '127.0.0.1'; // 客户端ip，必须传正确的用户ip，否则会报错
$request->notify_url = $GLOBALS['PAY_CONFIG']['pay_notify_url']; // 异步通知地址
$request->scene_info->store_id = '门店唯一标识，选填';
$request->scene_info->store_name = '门店名称，选填';

// 调用接口
$result = $pay->execute($request);
if ($pay->checkResult())
{
    $clientRequest = new \Yurun\PaySDK\Weixin\APP\Params\Client\Request();
    $clientRequest->prepayid = $result['prepay_id'];
    $pay->prepareExecute($clientRequest, $url, $data);
    var_dump($data); // 需要将这个数据返回给app端
}
else
{
    var_dump($pay->getErrorCode() . ':' . $pay->getError());
}
exit;
