<?php
namespace Yurun\PaySDK\AlipayApp\MiniApp\Params\Pay;

use \Yurun\PaySDK\Traits\JSONParams;

/**
 * 业务扩展参数
 */
class ExtendParams
{
	use JSONParams{
		toString as private traitToString;
	}

	/**
	 * 系统商编号，该参数作为系统商返佣数据提取的依据，请填写系统商签约协议的PID
	 * @var string
	 */
	public $sys_service_provider_id;

	/**
	 * 卡类型
	 *
	 * @var string
	 */
	public $card_type;

	public function toString()
	{
		if(null === $this->sys_service_provider_id && null === $this->card_type)
		{
			return null;
		}
		return $this->traitToString();
	}
}