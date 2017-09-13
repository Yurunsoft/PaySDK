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

	/**
	 * 是否允许上报
	 * @var boolean
	 */
	public $allowReport = true;

	public function __construct()
	{
		$this->_isSyncVerify = true;
	}
}