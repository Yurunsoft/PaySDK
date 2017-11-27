<?php
namespace Yurun\PaySDK;

/**
 * 请求类基类
 */
abstract class RequestBase
{
	/**
	 * 接口请求方法
	 * @var string
	 */
	public $_method = 'POST';

	/**
	 * 是否同步返回验证
	 * @var boolean
	 */
	public $_isSyncVerify = false;

	/**
	 * 当调用SDK的execute时触发，返回true时不执行SDK中默认的执行逻辑
	 * @param \Yurun\PaySDK\Base $sdk
	 * @param string $format 数据格式，json、xml等
	 * @return boolean
	 */
	public function __onExecute($sdk, $format)
	{
		return false;
	}
}