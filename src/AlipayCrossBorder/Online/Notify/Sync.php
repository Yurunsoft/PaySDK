<?php
namespace Yurun\PaySDK\AlipayCrossBorder\Online\Notify;

use \Yurun\PaySDK\AlipayCrossBorder\Online\Notify\Base;

/**
 * 支付宝境外支付同步通知类
 */
abstract class Sync extends Base
{
	/**
	 * 获取通知数据
	 * @return void
	 */
	public function getNotifyData()
	{
		if(null !== $this->swooleRequest)
		{
			return $this->swooleRequest->get;
		}
		return $_GET;
	}
}