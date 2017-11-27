<?php
namespace Yurun\PaySDK\AlipayApp\Params\Settle;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\Params\Settle\BusinessParams;

/**
 * 支付宝统一收单交易结算接口请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.trade.order.settle';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_1/alipay.trade.order.settle/
	 * @var \Yurun\PaySDK\AlipayApp\Params\Settle\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
		$this->_syncResponseName = 'alipay_trade_order_settle_response';
	}
}