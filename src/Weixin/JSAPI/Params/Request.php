<?php
namespace Yurun\PaySDK\Weixin\JSAPI\Params;

use \Yurun\PaySDK\Weixin\Params\PayRequestBase;
use \Yurun\PaySDK\Weixin\JSAPI\Params\SceneInfo;

class Request extends PayRequestBase
{
	/**
	 * 场景信息
	 * @var \Yurun\PaySDK\Weixin\JSAPI\Params\SceneInfo
	 */
	public $scene_info;

	/**
	 * 微信用户在商户对应appid下的唯一标识
	 * @var string
	 */
	public $openid;

	public function __construct()
	{
		$this->trade_type = 'JSAPI';
		$this->scene_info = new SceneInfo;
		parent::__construct();
	}
}