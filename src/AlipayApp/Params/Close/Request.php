<?php
namespace Yurun\PaySDK\AlipayApp\Params\Close;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\Params\Close\BusinessParams;

/**
 * 支付宝关闭订单请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.trade.close';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_1/alipay.trade.close
	 * @var \Yurun\PaySDK\AlipayApp\Params\Close\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
		$this->_syncResponseName = 'alipay_trade_close_response';
	}
}