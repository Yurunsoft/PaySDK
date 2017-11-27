<?php
namespace Yurun\PaySDK\Weixin\CompanyPay\Bank\Pay;

use \Yurun\PaySDK\WeixinRequestBase;
use \Yurun\PaySDK\Lib\Encrypt\RSA;

/**
 * 微信支付-企业付款到银行卡请求类
 */
class Request extends WeixinRequestBase
{
	/**
	 * 接口名称
	 * @var string
	 */
	public $_apiMethod = 'mmpaysptrans/pay_bank';

	/**
	 * 商户企业付款单号
	 * @var string
	 */
	public $partner_trade_no;

	/**
	 * 收款方银行卡号
	 * @var string
	 */
	public $enc_bank_no;

	/**
	 * 收款方用户名
	 * @var string
	 */
	public $enc_true_name;

	/**
	 * 收款方开户行
	 * @var string
	 */
	public $bank_code;

	/**
	 * 企业付款金额，单位为分
	 * @var string
	 */
	public $amount;

	/**
	 * 企业付款描述信息
	 * @var string
	 */
	public $desc;

	/**
	 * RSA加密公钥文件路径
	 * @var string
	 */
	public $rsaPublicCertFile;

	public function __construct()
	{
		parent::__construct();
		$this->_isSyncVerify = $this->needSignType = $this->needAppID = false;
	}

	public function toArray()
	{
		$data = get_object_vars($this);
		$data['enc_bank_no'] = \base64_encode(RSA::encryptPublicFromFile($data['enc_bank_no'], $this->rsaPublicCertFile));
		$data['enc_true_name'] = \base64_encode(RSA::encryptPublicFromFile($data['enc_true_name'], $this->rsaPublicCertFile));
		return $data;
	}
}