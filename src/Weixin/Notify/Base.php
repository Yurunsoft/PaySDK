<?php
namespace Yurun\PaySDK\Weixin\Notify;

use Yurun\PaySDK\NotifyBase;
use \Yurun\PaySDK\Weixin\Reply\Base as ReplyBase;
use \Yurun\PaySDK\Lib\XML;

abstract class Base extends NotifyBase
{
	public function __construct()
	{
		parent::__construct();
		$this->replyData = new ReplyBase;
	}

	/**
	 * 获取通知数据
	 * @return void
	 */
	public function getNotifyData()
	{
		return XML::fromString(\file_get_contents('php://input'));
	}
	
	/**
	 * 验证签名
	 * @return bool
	 */
	public function checkSign()
	{
		return !isset($this->data['return_code']) || 'SUCCESS' !== $this->data['return_code'] || $this->sdk->verifyCallback($this->data);
	}
}