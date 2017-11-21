<?php
namespace Yurun\PaySDK\Weixin\GetPublicKey;

use \Yurun\PaySDK\WeixinRequestBase;

class Request extends WeixinRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $_apiMethod = 'https://fraud.mch.weixin.qq.com/risk/getpublickey';

	public function __construct()
	{
		parent::__construct();
		$this->_isSyncVerify = $this->needAppID = false;
	}
}