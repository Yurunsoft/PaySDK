<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\ExchageRate;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\Online\ExchageRate\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'forex_rate_file';

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\Online\ExchageRate\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}