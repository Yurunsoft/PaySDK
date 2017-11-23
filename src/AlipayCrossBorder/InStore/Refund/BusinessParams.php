<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\Refund;

class BusinessParams
{
	/**
	 * 商户网站的订单号
	 * @var string
	 */
	public $partner_trans_id;

	/**
	 * 商户的退款单的订单号
	 * @var string
	 */
	public $partner_refund_id;

	/**
	 * 退款金额
	 * @var double
	 */
	public $refund_amount;
}