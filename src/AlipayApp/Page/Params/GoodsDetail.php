<?php
namespace Yurun\PaySDK\AlipayApp\Page\Params;

use \Yurun\PaySDK\Traits\JSONParams;

/**
 * 支付宝PC场景下单并支付商品详情类
 */
class GoodsDetail
{
	use JSONParams{
		toString as private traitToString;
	}

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
		return $this->traitToString();
	}
}