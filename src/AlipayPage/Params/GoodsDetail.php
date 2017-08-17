<?php
namespace Yurun\PaySDK\AlipayPage\Params;

use \Yurun\PaySDK\Traits\JSONParams;

class GoodsDetail
{
	use JSONParams;

	/**
	 * 在支付时，可点击商品名称跳转到该地址
	 * @var string
	 */
	public $show_url;

	public function toString()
	{
		if(null === $this->show_url)
		{
			return null;
		}
		return parent::toString();
	}
}