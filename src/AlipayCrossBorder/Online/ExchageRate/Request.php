<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\ExchageRate;

use \Yurun\PaySDK\AlipayRequestBase;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'forex_rate_file';

	public function __construct()
	{
		$this->_method = 'GET';
	}
}