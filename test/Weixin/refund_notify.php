<?php
/**
 * 微信支付退款通知回调Demo
 */
require __DIR__ . '/common.php';

// 公共配置
$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
$params->key = $GLOBALS['PAY_CONFIG']['key'];

// SDK实例化，传入公共配置
$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

class RefundNotify extends \Yurun\PaySDK\Weixin\Notify\Refund
{
	/**
	 * 后续执行操作
	 * @return void
	 */
	protected function __exec()
	{
		// 支付成功处理，一般做订单处理
		file_put_contents(__DIR__ . '/refund_notify_result.txt', date('Y-m-d H:i:s') . ':' . var_export($this->data, true));
		// 告诉微信我处理过了，不要再通过了
		$this->reply('SUCCESS', 'OK');
	}
}
$refundNotify = new RefundNotify;
try{
	$sdk->notify($refundNotify);
}catch(Exception $e){
	file_put_contents(__DIR__ . '/refund_notify_result.txt', $e->getMessage() . ':' . var_export($refundNotify->data, true));
}