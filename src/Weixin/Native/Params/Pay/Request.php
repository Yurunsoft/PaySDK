<?php
namespace Yurun\PaySDK\Weixin\Native\Params\Pay;

use \Yurun\PaySDK\Weixin\Params\PayRequestBase;
use \Yurun\PaySDK\Weixin\Native\Params\SceneInfo;

class Request extends PayRequestBase
{
	/**
	 * 场景信息
	 * @var \Yurun\PaySDK\Weixin\Native\Params\SceneInfo
	 */
	public $scene_info;

	public function __construct()
	{
		$this->trade_type = 'NATIVE';
		$this->scene_info = new SceneInfo;
		parent::__construct();
	}
}