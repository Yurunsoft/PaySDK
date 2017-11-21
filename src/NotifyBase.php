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
	 * @var mixed
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
		if(!$this->notifyVerify())
		{
			$this->reply(false, '签名失败');
			throw new \Exception('签名验证失败');
		}
		$this->__exec();
	}

	/**
	 * 返回数据
	 * @param boolean $success
	 * @param string $message
	 * @return void
	 */
	public abstract function reply($success, $message = '');

	/**
	 * 获取通知数据
	 * @return void
	 */
	public abstract function getNotifyData();

	/**
	 * 对通知进行验证，是否是正确的通知
	 * @return bool
	 */
	public abstract function notifyVerify();

	/**
	 * 后续执行操作
	 * @return void
	 */
	protected abstract function __exec();
}