<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\DownloadSettlement;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\Online\DownloadSettlement\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'forex_liquidation_file';

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\Online\DownloadSettlement\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}