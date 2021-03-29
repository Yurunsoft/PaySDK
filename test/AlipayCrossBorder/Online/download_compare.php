<?php
/**
 * 支付宝 Cross-border Online Payment 对账文件下载 Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayCrossBorder\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayCrossBorder\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayCrossBorder\Online\DownloadCompare\Request();
$request->start_date = '20171120';
$request->end_date = '20171121';

// 调用接口
$result = $pay->executeDownload($request, __DIR__ . '/compare.txt');
