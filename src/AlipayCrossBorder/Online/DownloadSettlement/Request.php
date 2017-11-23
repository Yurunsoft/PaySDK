<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\DownloadSettlement;

use \Yurun\PaySDK\AlipayRequestBase;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'forex_liquidation_file';

	/**
	 * 交易的开始日期、格式为YYYYMMDD
	 * @var string
	 */
	public $start_date;
	
	/**
	 * 交易的结束日期、格式为YYYYMMDD
	 * @var string
	 */
	public $end_date;

	public function __construct()
	{
		$this->_method = 'GET';
	}
}