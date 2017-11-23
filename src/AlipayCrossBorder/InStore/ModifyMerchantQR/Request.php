<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyMerchantQR;

use \Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyMerchantQR\BusinessParams;

class Request extends \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateMerchantQR\Request
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $service = 'alipay.commerce.qrcode.modify';
	
	/**
	 * 业务请求参数
	 * @var \Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyMerchantQR\BusinessParams
	 */
	public $businessParams;
	
	public function __construct()
	{
		parent::__construct();
		$this->businessParams = new BusinessParams;
	}
}