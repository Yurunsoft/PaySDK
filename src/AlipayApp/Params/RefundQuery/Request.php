<?php
namespace Yurun\PaySDK\AlipayApp\Params\RefundQuery;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\Params\RefundQuery\BusinessParams;

/**
 * 支付宝统一收单交易退款查询请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.trade.fastpay.refund.query';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_1/alipay.trade.fastpay.refund.query/
	 * @var \Yurun\PaySDK\AlipayApp\Params\RefundQuery\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
		$this->_syncResponseName = 'alipay_trade_fastpay_refund_query_response';
	}
}