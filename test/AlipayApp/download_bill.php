<?php
/**
 * 支付宝查询对账单下载地址Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayApp\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayApp\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayApp\Params\DownloadBill\Request;
$request->businessParams->bill_type = 'trade';
$request->businessParams->bill_date = date('Y-m', strtotime('-1 month')); // 不能获取当月或当日的，这里获取上个月

// 调用接口获取对账单下载地址
$data = $pay->execute($request);
var_dump($data);

// 下载对账单
$download = new \Yurun\Until\Download($data['alipay_data_dataservice_bill_downloadurl_query_response']['bill_download_url']);
$download->download(__DIR__ . '/test.zip');