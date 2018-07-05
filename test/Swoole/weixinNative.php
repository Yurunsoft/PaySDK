<?php
/**
 * Swoole 协程 Demo
 * 请先安装 Swoole 扩展
 * 运行方式：php test/Swoole/weixinNative.php
 * 
 * 请勿直接将本文件用于生产环境，仅作为演示用
 * Swoole 暂时仅有微信扫码支付（模式二）+支付异步通知演示，但其实用法和传统方式基本一致
 */
require dirname(__DIR__) . '/common.php';

use Yurun\Util\YurunHttp;

$GLOBALS['PAY_CONFIG'] = array(
	'appid'			=>	'',
	'mch_id'		=>	'',
	'key'			=>	'',
	'pay_notify_url'	=>	'http://yurun.test.com/test/Weixin/pay_notify.php',
	'certPath'	=>	__DIR__ . '/cert/apiclient_cert.pem',
	'keyPath'	=>	__DIR__ . '/cert/apiclient_key.pem',
);

// 设置 Http 请求处理器为 Swoole
YurunHttp::setDefaultHandler('Yurun\Util\YurunHttp\Handler\Swoole');

class PayNotify extends \Yurun\PaySDK\Weixin\Notify\Pay
{
	/**
	 * 后续执行操作
	 * @return void
	 */
	protected function __exec()
	{
		// 支付成功处理，一般做订单处理，$this->data 是从微信发送来的数据
		file_put_contents(__DIR__ . '/notify_result.txt', date('Y-m-d H:i:s') . ':' . var_export($this->data, true));
		// 告诉微信我处理过了，不要再通过了
		$this->reply(true, 'OK');
	}
}

$server = new swoole_http_server('0.0.0.0', 80);
$server->on('request', function ($request, $response) {
	switch($request->server['request_uri'])
	{
		case '/unifiedorder':
			unifiedorder($request, $response);
			break;
		case '/pay_notify':
			payNotify($request, $response);
			break;
		default:
			$response->end('404');
			break;
	}
});
$server->start();

function unifiedorder($request, $response)
{
	// 公共配置
	$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
	$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
	$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
	$params->key = $GLOBALS['PAY_CONFIG']['key'];

	// SDK实例化，传入公共配置
	$pay = new \Yurun\PaySDK\Weixin\SDK($params);
	// 这2行很重要，和传统用法的差异处
	$pay->swooleRequest = $request;
	$pay->swooleResponse = $response;

	// 支付接口
	$request = new \Yurun\PaySDK\Weixin\Native\Params\Pay\Request;
	$request->body = 'test'; // 商品描述
	$request->out_trade_no = 'test' . mt_rand(10000000,99999999); // 订单号
	$request->total_fee = 1; // 订单总金额，单位为：分
	$request->spbill_create_ip = '127.0.0.1'; // 客户端ip
	$request->notify_url = $GLOBALS['PAY_CONFIG']['pay_notify_url']; // 异步通知地址

	// 调用接口
	$result = $pay->execute($request);
	$shortUrl = $result['code_url'];
	$response->end(json_encode([
		'message'	=>	'weixin qr scan url:',
		'url'		=>	$shortUrl,
	]));
}

function payNotify($request, $response)
{
	// 公共配置
	$params = new \Yurun\PaySDK\Weixin\Params\PublicParams;
	$params->appID = $GLOBALS['PAY_CONFIG']['appid'];
	$params->mch_id = $GLOBALS['PAY_CONFIG']['mch_id'];
	$params->key = $GLOBALS['PAY_CONFIG']['key'];

	// SDK实例化，传入公共配置
	$sdk = new \Yurun\PaySDK\Weixin\SDK($params);

	$payNotify = new PayNotify;
	// 这2行很重要，和传统用法的差异处
	$payNotify->swooleRequest = $request;
	$payNotify->swooleResponse = $response;
	try{
		$sdk->notify($payNotify);
	}catch(Exception $e){
		file_put_contents(__DIR__ . '/notify_result.txt', $e->getMessage() . ':' . var_export($payNotify->data, true));
	}
}
