<?php
/**
 * 微信支付-查询企业付款到银行卡Demo.
 */
require_once dirname(__DIR__) . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];
$params->certPath = $GLOBALS['PAY_CONFIG']['certPath'];
$params->keyPath = $GLOBALS['PAY_CONFIG']['keyPath'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\CompanyPay\Bank\Query\Request();
$request->partner_trade_no = 'test123456'; // 订单号

$result = $sdk->execute($request);

var_dump('result:', $result);

var_dump('success:', $sdk->checkResult());

var_dump('error:', $sdk->getError(), 'error_code:', $sdk->getErrorCode(), $sdk->requestData);
