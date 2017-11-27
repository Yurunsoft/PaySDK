<?php
namespace Yurun\PaySDK\AlipayApp\FTF\Params\QR;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\FTF\Params\QR\BusinessParams;

/**
 * 支付宝统一收单线下交易预创建（扫码支付）请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.trade.precreate';

	/**
	 * 支付宝服务器主动通知商户服务器里指定的页面http/https路径。
	 * @var string
	 */
	public $notify_url;

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_1/alipay.trade.precreate/
	 * @var \Yurun\PaySDK\AlipayApp\FTF\Params\QR\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
		$this->_isSyncVerify = true;
		$this->_syncResponseName = 'alipay_trade_precreate_response';
	}
}