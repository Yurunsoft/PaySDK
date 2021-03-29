<?php
/**
 * 支付宝交易结算Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayApp\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->appPublicKey = $GLOBALS['PAY_CONFIG']['publicKey'];
$params->appPrivateKey = $GLOBALS['PAY_CONFIG']['privateKey'];
// $params->appPrivateKeyFile = ''; // 证书文件，如果设置则这个优先使用
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$pay = new \Yurun\PaySDK\AlipayApp\SDK($params);

// 支付接口
$request = new \Yurun\PaySDK\AlipayApp\Params\Settle\Request();
$request->notify_url = $GLOBALS['PAY_CONFIG']['notify_url']; // 结果通知地址
$request->businessParams->out_trade_no = ''; // 结算请求流水号 开发者自行生成并保证唯一性
$request->businessParams->trade_no = ''; // 支付宝订单号
$param = new Yurun\PaySDK\AlipayApp\Params\Settle\RoyaltyParameter();
$param->trans_out = ''; // 分账支出方账户，类型为userId，本参数为要分账的支付宝账号对应的支付宝唯一用户号。以2088开头的纯16位数字。
$param->trans_in = ''; // 分账收入方账户，类型为userId，本参数为要分账的支付宝账号对应的支付宝唯一用户号。以2088开头的纯16位数字。
$param->amount = ''; // 分账的金额，单位为元
$param->amount_percentage = ''; // 分账信息中分账百分比。取值范围为大于0，少于或等于100的整数。
$param->desc = ''; // 分账描述
$request->businessParams->royalty_parameters[] = $param;
// 调用接口
$result = $pay->execute($request);

var_dump('result:', $result);

var_dump('success:', $pay->checkResult());

var_dump('error:', $pay->getError(), 'error_code:', $pay->getErrorCode());
