<?php
namespace Yurun\PaySDK\Weixin\Notify;

use \Yurun\PaySDK\Weixin\Notify\Base;
use \Yurun\PaySDK\Weixin\Reply\Pay as ReplyPay;

abstract class Pay extends Base
{
	/**
	 * 返回数据
	 * @var \Yurun\PaySDK\Weixin\Reply\Pay
	 */
	public $replyData;

	public function __construct()
	{
		parent::__construct();
		$this->replyData = new ReplyPay;
	}
}