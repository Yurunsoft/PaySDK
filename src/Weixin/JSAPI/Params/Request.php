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

	public function __construct()
	{
		$this->trade_type = 'JSAPI';
		$this->scene_info = new SceneInfo;
		parent::__construct();
	}
}