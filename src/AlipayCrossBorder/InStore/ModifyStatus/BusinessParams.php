<?php
namespace Yurun\PaySDK\AlipayCrossBorder\InStore\ModifyStatus;

use Yurun\PaySDK\Lib\ObjectToArray;

class BusinessParams
{
	/**
	 * 业务类型
	 * @var string
	 */
	public $biz_type = 'OVERSEASHOPQRCODE';

	/**
	 * 成功生成代码后返回的二维码值
	 * @var string
	 */
	public $qrcode;

	/**
	 * 状态
	 * STOP: 停止二维码。如果用户扫描停止的二维码, 将通知他二维码无效。
	 * RESTART: 二维码可以在重新启动后使用。
	 * DELETE: 删除二维码。如果用户扫描删除的二维码, 他将被通知二维码是无效的。删除后无法重新启动代码。
	 * @var string
	 */
	public $status;
}