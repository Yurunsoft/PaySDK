<?php
namespace Yurun\PaySDK\AlipayApp\Fund\Query;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\Fund\Query\BusinessParams;

/**
 * 支付宝查询转账订单接口请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.fund.trans.order.query';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_28/alipay.fund.trans.order.query
	 * @var \Yurun\PaySDK\AlipayApp\Fund\Query\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}