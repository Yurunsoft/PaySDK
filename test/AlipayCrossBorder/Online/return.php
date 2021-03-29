<?php
/**
 * 支付宝即时到账同步返回Demo.
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayCrossBorder\Params\PublicParams();
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\AlipayCrossBorder\SDK($params);

class PayNotify extends \Yurun\PaySDK\AlipayCrossBorder\Online\Notify\Sync
{
    /**
     * 后续执行操作.
     *
     * @return void
     */
    protected function __exec()
    {
        // 这里不应该做订单状态处理
        var_dump($this->data);
    }
}
$payNotify = new PayNotify();
try
{
    $sdk->notify($payNotify);
}
catch (Exception $e)
{
    var_dump($e);
}
