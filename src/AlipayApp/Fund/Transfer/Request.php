<?php
namespace Yurun\PaySDK\AlipayApp\Fund\Transfer;

use \Yurun\PaySDK\AlipayRequestBase;
use \Yurun\PaySDK\AlipayApp\Fund\Transfer\BusinessParams;

/**
 * 支付宝单笔转账到支付宝账户接口请求类
 */
class Request extends AlipayRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $method = 'alipay.fund.trans.toaccount.transfer';

	/**
	 * 详见：https://docs.open.alipay.com/common/105193
	 * @var string
	 */
	public $app_auth_token;

	/**
	 * 业务请求参数
	 * 参考https://docs.open.alipay.com/api_28/alipay.fund.trans.toaccount.transfer/
	 * @var \Yurun\PaySDK\AlipayApp\Fund\Transfer\BusinessParams
	 */
	public $businessParams;

	public function __construct()
	{
		$this->businessParams = new BusinessParams;
		$this->_method = 'GET';
	}
}