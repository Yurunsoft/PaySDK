<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyMerchantQR;

class Request extends \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateMerchantQR\Request
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.commerce.qrcode.modify';
	
	/**
	 * 成功生成代码后返回的二维码值
	 * @var string
	 */
	public $qrcode;
	
}