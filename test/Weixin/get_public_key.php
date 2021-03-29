<?php
/**
 * 微信支付获取RSA加密公钥Demo，企业付款到银行卡接口需要
 */
require_once __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];
$params->certPath = $GLOBALS['PAY_CONFIG']['certPath'];
$params->keyPath = $GLOBALS['PAY_CONFIG']['keyPath'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

$request = new \Yurun\PaySDK\Weixin\GetPublicKey\Request();

$result = $sdk->execute($request);

var_dump('result:', $result);
$success = $sdk->checkResult();
if ($success)
{
    // 将$result['pub_key']存储到本地，企业付款到银行卡接口调用时需要使用
    // file_put_contents(__DIR__ . '/cert/weixin-rsa-public.pem', $result['pub_key']);
    /*
    你还需要执行openssl rsa -RSAPublicKey_in -in weixin-rsa-public.pem -pubout
    将命令行输出的证书内容覆盖到weixin-rsa-public.pem文件中才可使用
    */

    // 保存 RSA 公钥为 PHP 可用的 pkcs8 格式
    $sdk->saveRSAPublic(__DIR__ . '/cert/weixin-rsa-public.pem');
}

var_dump('success:', $success);

var_dump('error:', $sdk->getError(), 'error_code:', $sdk->getErrorCode());
