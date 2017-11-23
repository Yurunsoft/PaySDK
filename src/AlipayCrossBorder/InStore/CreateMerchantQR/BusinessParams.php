<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\CreateMerchantQR;

use Yurun\PaySDK\Lib\ObjectToArray;

class BusinessParams
{
	/**
	 * 业务类型
	 * @var string
	 */
	public $biz_type = 'OVERSEASHOPQRCODE';

	/**
	 * 业务数据
	 * @var \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateMerchantQR\BizData
	 */
	public $biz_data;

	public function __construct()
	{
		$this->biz_data = new \Yurun\PaySDK\AlipayCrossBorder\InStore\CreateMerchantQR\BizData;
	}

	public function toArray()
	{
		$obj = (array)$this;
		$obj['biz_data'] = json_encode(ObjectToArray::parse($obj['biz_data']));
		return $obj;
	}
}