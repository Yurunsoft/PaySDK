<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\Cancel;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\InStore\Cancel\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.acquire.cancel';

	/**
	 * 商户服务器发送请求的时间戳, 精确到毫秒
	 * @var int
	 */
	public $timestamp;

	/**
	 * 终端发送请求的时间戳, 精确到毫秒。
	 * @var int
	 */
	public $terminal_timestamp;

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\InStore\Cancel\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
	}

	public function toArray()
	{
		$obj = (array)$this;
		if(empty($obj['timestamp']))
		{
			$obj['timestamp'] = round(\microtime(true) * 1000);
		}
		return $obj;
	}
}