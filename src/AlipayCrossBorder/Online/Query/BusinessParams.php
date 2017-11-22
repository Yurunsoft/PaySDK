<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\Query;

class BusinessParams
{
	/**
	 * 支付宝根据商户请求，创建订单生成的支付宝交易号。 
	 * 最短16位，最长64位。 
	 * 建议使用支付宝交易号进行查询，用商户网站唯一订单号查询的效率比较低。
	 * @var string
	 */
	public $trade_no;

	/**
	 * 支付宝合作商户网站唯一订单号（确保在商户系统中唯一）。
	 * @var string
	 */
	public $out_trade_no;
}