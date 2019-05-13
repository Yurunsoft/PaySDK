<?php
namespace Yurun\PaySDK\AlipayApp\FTF\Params;

use \Yurun\PaySDK\Traits\JSONParams;

/**
 * 支付宝当面付扩展参数
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

	public function toString()
	{
		if(null === $this->sys_service_provider_id)
		{
			return null;
		}
		return $this->traitToString();
	}
}