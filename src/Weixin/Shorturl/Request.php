<?php
namespace Yurun\PaySDK\Weixin\Shorturl;

use \Yurun\PaySDK\WeixinRequestBase;

class Request extends WeixinRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $_apiMethod = 'tools/shorturl';

	/**
	 * URL链接
	 * @var string
	 */
	public $long_url;
}