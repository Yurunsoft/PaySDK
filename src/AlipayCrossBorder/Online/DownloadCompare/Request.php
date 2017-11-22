<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\DownloadCompare;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\Online\DownloadCompare\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'forex_compare_file';

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\Online\DownloadCompare\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}