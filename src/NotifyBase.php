<?php
namespace Yurun\PaySDK;

use \Yurun\PaySDK\Lib\ObjectToArray;

/**
 * 通知处理类基类
 */
abstract class NotifyBase
{
	/**
	 * 通知数据
	 * @var array
	 */
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
	 * swoole 请求类
	 *
	 * @var \swoole_http_request
	 */
	public $swooleRequest;

	/**
	 * swoole 响应类
	 *
	 * @var \swoole_http_response
	 */
	public $swooleResponse;

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
			$this->reply(false, '通知不合法');
			throw new \Exception('通知不合法');
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