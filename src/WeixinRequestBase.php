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
	 * 参数中是否需要带有app_id
	 * @var boolean
	 */
	public $needAppID = true;

	/**
	 * 参数中是否需要带有mch_id
	 * @var boolean
	 */
	public $needMchID = true;

	/**
	 * 参数中是否需要带有sign_type
	 * @var boolean
	 */
	public $needSignType = true;

	/**
	 * 签名类型，为null时使用publicParams设置
	 * @var string
	 */
	public $signType = null;
	
	/**
	 * 参数中是否需要带有nonce_str
	 * @var boolean
	 */
	public $needNonceStr = true;

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