<?php
/**
 * 微信H5支付Demo
 */
require dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\Weixin\SDK($params);
// 支付接口
$request = new \Yurun\PaySDK\Weixin\H5\Params\Pay\Request;
$request->body = 'test'; // 商品描述
$request->out_trade_no = 'test' . mt_rand(10000000,99999999); // 订单号
$request->total_fee = 1; // 订单总金额，单位为：分
$request->spbill_create_ip = '127.0.0.1'; // 客户端ip，必须传正确的用户ip，否则会报错
$request->notify_url = $GLOBALS['PAY_CONFIG']['pay_notify_url']; // 异步通知地址
$request->scene_info = new \Yurun\PaySDK\Weixin\H5\Params\SceneInfo;
$request->scene_info->type = 'Wap'; // 可选值：IOS、Android、Wap
// 下面参数根据type不同而不同
$request->scene_info->wap_url = 'https://baidu.com';
$request->scene_info->wap_name = 'test';

// 调用接口
$result = $pay->execute($request);
if('SUCCESS' === $result['return_code'] && 'SUCCESS' === $result['result_code'])
{
	// 跳转支付界面
	header('Location: ' . $result['mweb_url']);
}