<?php
namespace Yurun\PaySDK\Weixin\CloseOrder;

use \Yurun\PaySDK\WeixinRequestBase;

class Request extends WeixinRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $_apiMethod = 'pay/closeorder';

	/**
	 * 商户订单号
	 * @var string
	 */
	public $out_trade_no;

}