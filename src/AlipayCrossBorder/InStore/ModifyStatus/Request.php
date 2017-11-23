<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyStatus;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyStatus\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.commerce.qrcode.modifyStatus';

	/**
	 * 调用接口的北京时间，格式为yyyy-MM-dd HH:mm:ss
	 * @var string
	 */
	public $timestamp;
	
	/**
	 * 支付宝将在 HTTP Post 方法中异步通知结果。
	 * @var string
	 */
	public $notify_url;

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyStatus\BusinessParams
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
			$obj['timestamp'] = date('Y-m-d H:i:s');
		}
		return $obj;
	}
}