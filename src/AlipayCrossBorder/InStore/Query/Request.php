<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\Query;

use \Yurun\PaySDK\AlipayRequestBase;

class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.acquire.overseas.query';

	/**
	 * 商户网站的订单号
	 * @var string
	 */
	public $partner_trans_id;
	
	/**
	 * 支付宝订单号
	 * @var string
	 */
	public $alipay_trans_id;

	public function __construct()
	{
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
	}
}