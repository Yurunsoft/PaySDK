<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\Pay;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\Online\Pay\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'create_forex_trade';

	/**
	 * 同步返回地址，HTTP/HTTPS开头字符串
	 * @var string
	 */
	public $return_url;

	/**
	 * 支付宝服务器主动通知商户服务器里指定的页面http/https路径。
	 * @var string
	 */
	public $notify_url;

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\Online\Pay\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}