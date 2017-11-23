<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyMerchantQR;

use Yurun\PaySDK\Lib\ObjectToArray;

class BusinessParams extends \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateMerchantQR\BusinessParams
{
	/**
	 * 成功生成代码后返回的二维码值
	 * @var string
	 */
	public $qrcode;
}