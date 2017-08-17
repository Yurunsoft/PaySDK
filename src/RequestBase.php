<?php
namespace Yurun\PaySDK;

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
}