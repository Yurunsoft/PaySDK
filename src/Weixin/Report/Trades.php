<?php
namespace Yurun\PaySDK\Weixin\Report;

use Yurun\PaySDK\Traits\JSONParams;

class Trades
{
	use JSONParams;

	/**
	 * 列表数据
	 * @var array
	 */
	public $list = array();

	public function toString()
	{
		return json_encode($this->list);
	}
}