<?php
namespace Yurun\PaySDK;

/**
 * 微信请求类基类
 */
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
	 * 为true时，自动带上nonce_str
	 * 为false时，不带上nonce_str
	 * 为字符串时，使用该字符串作为nonce_str字段名
	 * @var boolean|string
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