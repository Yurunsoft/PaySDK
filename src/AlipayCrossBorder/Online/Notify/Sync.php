<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\Notify;

use \Yurun\PaySDK\AlipayCrossBorder\Online\Notify\Base;

abstract class Sync extends Base
{
	/**
	 * 获取通知数据
	 * @return void
	 */
	public function getNotifyData()
	{
		return $_GET;
	}
}