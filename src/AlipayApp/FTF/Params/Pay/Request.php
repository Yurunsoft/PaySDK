<?php
namespace Yurun\PaySDK\AlipayApp\FTF\Params\Pay;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\FTF\Params\Pay\BusinessParams;

/**
 * 支付宝统一收单交易支付接口请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.trade.pay';

	/**
	 * 支付宝服务器主动通知商户服务器里指定的页面http/https路径。
	 * @var string
	 */
	public $notify_url;

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_1/alipay.trade.pay
	 * @var \Yurun\PaySDK\AlipayApp\FTF\Params\Pay\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
		$this->_syncResponseName = 'alipay_trade_pay_response';
	}
}