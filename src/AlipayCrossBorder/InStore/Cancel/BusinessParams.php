<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\Cancel;

class BusinessParams
{
	/**
	 * 商户网站的订单号
	 * @var string
	 */
	public $out_trade_no;

	/**
	 * 支付宝的订单号
	 * @var string
	 */
	public $trade_no;
}