<?php
/**
 * 支付宝即时到账异步通知Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\AlipayCrossBorder\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->md5Key = $GLOBALS['PAY_CONFIG']['md5Key'];
$params->apiDomain = 'https://openapi.alipaydev.com/gateway.do'; // 设为沙箱环境，如正式环境请把这行注释

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\AlipayCrossBorder\SDK($params);

class PayNotify extends \Yurun\PaySDK\AlipayCrossBorder\Online\Notify\Pay
{
	/**
	 * 后续执行操作
	 * @return void
	 */
	protected function __exec()
	{
		// 支付成功处理，一般做订单处理
		file_put_contents(__DIR__ . '/notify_result.txt', date('Y-m-d H:i:s') . ':' . var_export($this->data, true));
		// 告诉微信我处理过了，不要再通过了
		$this->reply(true);
	}
}
$payNotify = new PayNotify;
try{
	$sdk->notify($payNotify);
}catch(Exception $e){
	file_put_contents(__DIR__ . '/notify_result.txt', $e->getMessage() . ':' . var_export($payNotify->data, true));
}