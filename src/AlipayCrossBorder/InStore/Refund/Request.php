<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\Refund;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\InStore\Refund\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.acquire.overseas.spot.refund';

	/**
	 * 退款通知地址，必须使用https协议
	 * @var string
	 */
	public $notify_url;

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\InStore\Refund\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
	}
}