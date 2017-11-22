<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\BarcodePay;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\InStore\BarcodePay\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.acquire.overseas.spot.pay';

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\InStore\BarcodePay\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
	}
}