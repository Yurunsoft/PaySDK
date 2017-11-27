<?php
namespace Yurun\PaySDK\AlipayApp\Params\Cancel;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\Params\Cancel\BusinessParams;

/**
 * 支付宝取消订单请求参数类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.trade.cancel';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_1/alipay.trade.cancel
	 * @var \Yurun\PaySDK\AlipayApp\Params\Cancel\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
		$this->_syncResponseName = 'alipay_trade_cancel_response';
	}
}