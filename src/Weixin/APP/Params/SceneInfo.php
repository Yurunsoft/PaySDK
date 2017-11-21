<?php
namespace Yurun\PaySDK\Weixin\APP\Params;

use Yurun\PaySDK\Traits\JSONParams;

class SceneInfo
{
	use JSONParams;

	/**
	 * 门店唯一标识，选填
	 * @var string
	 */
	public $store_id;

	/**
	 * 门店名称，选填
	 * @var string
	 */
	public $store_name;

}