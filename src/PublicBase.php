<?php
namespace Yurun\PaySDK;

abstract class PublicBase
{
	/**
	 * 接口网关
	 * @var string
	 */
	public $apiDomain;

	/**
	 * 支付平台分配给开发者的应用ID
	 * @var string
	 */
	public $appID;
}