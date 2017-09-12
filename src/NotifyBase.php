<?php
namespace Yurun\PaySDK;

use \Yurun\PaySDK\Lib\ObjectToArray;

abstract class NotifyBase
{
	public $data;

	/**
	 * SDK实例化
	 * @var Yurun\PaySDK\Base
	 */
	public $sdk;

	/**
	 * 返回数据
	 * @var \Yurun\PaySDK\Weixin\Reply\Base
	 */
	public $replyData;

	/**
	 * 返回数据是否需要签名
	 * @var boolean
	 */
	public $needSign = true;

	public function __construct()
	{
		
	}

	/**
	 * 执行
	 * @return void
	 */
	public function exec()
	{
		$this->data = $this->getNotifyData();
		if(!$this->checkSign())
		{
			$this->reply('FAIL', '签名失败');
			throw new \Exception('签名验证失败');
		}
		$this->__exec();
	}

	/**
	 * 返回数据
	 * @return void
	 */
	public function reply($code = null, $msg = null)
	{
		if(null !== $code)
		{
			$this->replyData->return_code = $code;
		}
		if(null !== $msg)
		{
			$this->replyData->return_msg = $msg;
		}
		if($this->needSign)
		{
			$this->replyData->sign = $this->sdk->sign(ObjectToArray::parse($this->replyData));
		}
		echo $this->replyData;
	}

	/**
	 * 获取通知数据
	 * @return void
	 */
	public abstract function getNotifyData();

	/**
	 * 验证签名
	 * @return bool
	 */
	public abstract function checkSign();

	/**
	 * 后续执行操作
	 * @return void
	 */
	protected abstract function __exec();
}