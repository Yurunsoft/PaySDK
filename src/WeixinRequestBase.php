<?php
namespace Yurun\PaySDK;

abstract class WeixinRequestBase extends RequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $_apiMethod = '';

	/**
	 * 参数中需要带有sign_type
	 * @var boolean
	 */
	public $needSignType = true;

	public function __construct()
	{
		$this->_isSyncVerify = true;
	}
}