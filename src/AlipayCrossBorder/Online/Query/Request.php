<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\Query;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\Online\Query\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'single_trade_query';

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\Online\Query\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
	}
}