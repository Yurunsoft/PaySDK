<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\CreateQR;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateQR\BusinessParams;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.acquire.create';

	/**
	 * 支付宝将在 HTTP Post 方法中异步通知结果。
	 * @var string
	 */
	public $notify_url;

	/**
	 * 签名类型。1: 证书签名 2: 其他密钥签名。如果为空, 将使用默认值2。
	 * @var string
	 */
	public $alipay_ca_request;

	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateQR\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
	}

}