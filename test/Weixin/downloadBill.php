<?php
/**
 * 微信支付下载对账单Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\DownloadBill\Request();
$request->bill_date = '20170912'; // 下载对账单的日期
$request->bill_type = 'ALL'; // 账单类型

// 下载对账单成功时候返回csv格式数据，失败返回xml数据，请自行判断是否成功
var_dump($sdk->execute($request, ''));
