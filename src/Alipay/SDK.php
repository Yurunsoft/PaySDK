<?php
namespace Yurun\PaySDK\Alipay;

use \Yurun\PaySDK\Base;
use \Yurun\PaySDK\Lib\ObjectToArray;

/**
 * 支付宝即时到账SDK类
 */
class SDK extends Base
{
    public $gateway = 'http://notify.alipay.com/trade/notify_query.do?';

	/**
	 * 公共参数
	 * @var \Yurun\PaySDK\Alipay\Params\PublicParams
	 */
	public $publicParams;

	/**
	 * 处理执行接口的数据
	 * @param $params
	 * @param &$data 数据数组
	 * @param &$requestData 请求用的数据，格式化后的
	 * @param &$url 请求地址
	 * @return array
	 */
	public function __parseExecuteData($params, &$data, &$requestData, &$url)
	{
		$data = \array_merge(ObjectToArray::parse($this->publicParams), ObjectToArray::parse($params), ObjectToArray::parse($params->businessParams));
		unset($data['apiDomain'], $data['appID'], $data['businessParams'], $data['appPrivateKey'], $data['appPrivateKeyFile'], $data['md5Key'], $data['appPublicKey'], $data['appPublicKeyFile'], $data['_syncResponseName'], $data['_method'], $data['_isSyncVerify']);
		$data['partner'] = $this->publicParams->appID;
		foreach($data as $key => $value)
		{
			if('' == $value)
			{
				unset($data[$key]);
			}
		}
		$data['sign'] = $this->sign($data);
		$requestData = $data;
		$url = $this->publicParams->apiDomain;
	}

	public function sign($data)
	{
		$content = $this->parseSignData($data);
		if(empty($this->publicParams->appPrivateKeyFile))
		{
			$key = $this->publicParams->appPrivateKey;
			$method = 'signPrivate';
		}
		else
		{
			$key = $this->publicParams->appPrivateKeyFile;
			$method = 'signPrivateFromFile';
		}
		switch($this->publicParams->sign_type)
		{
			case 'DSA':
				$result = \Yurun\PaySDK\Lib\Encrypt\DSA::$method($content, $key);
				break;
			case 'RSA':
				$result = \Yurun\PaySDK\Lib\Encrypt\RSA::$method($content, $key);
				break;
			case 'MD5':
				return md5($content . $this->publicParams->md5Key);
			default:
				throw new \Exception('未知的加密方式：' . $this->publicParams->sign_type);
		}
		return \base64_encode($result);
	}


    //获取远程服务器ATN结果
    //输出 服务器ATN结果字符串: 验证通过返回true,失败返回false. 注意:notify_id有效期大概1min, 在有效期内可以重复使用.
    public function verify_source($partner,$notify_id){
	    $gateway = $this->gateway.'partner='.$partner.'&notify_id='.$notify_id;
        return url_get($gateway);
    }
	/**
	 * 验证回调通知是否合法
	 * @param $data
	 * @return bool
	 */
	public function verifyCallback($data)
	{
		if(!isset($data['sign'], $data['sign_type'],$data['seller_id'],$data['notify_id']))
		{
			return false;
		}
		if($this->verify_source($data['seller_id'],$data['notify_id']) != 'true'){
		    return false;
        }
		$content = $this->parseSignData($data);
		if(empty($this->publicParams->appPublicKeyFile))
		{
			$key = $this->publicParams->appPublicKey;
			$method = 'verifyPublic';
		}
		else
		{
			$key = $this->publicParams->appPublicKeyFile;
			$method = 'verifyPublicFromFile';
		}
		switch($this->publicParams->sign_type)
		{
			case 'DSA':
				return \Yurun\PaySDK\Lib\Encrypt\DSA::$method($content, $key, \base64_decode($data['sign']));
			case 'RSA':
				return \Yurun\PaySDK\Lib\Encrypt\RSA::$method($content, $key, \base64_decode($data['sign']));
			case 'MD5':
				return $data['sign'] === md5($content . $this->publicParams->md5Key);
			default:
				throw new \Exception('未知的加密方式：' . $this->publicParams->sign_type);
		}
	}

	/**
	 * 验证同步返回内容
	 * @param AlipayRequestBase $params
	 * @param array $data
	 * @return bool
	 */
	public function verifySync($params, $data)
	{
		return true;
	}

	public function parseSignData($data)
	{
		unset($data['sign_type'], $data['sign']);
		\ksort($data);
		$content = '';
		foreach ($data as $k => $v){
			if($v !== '' && $v !== null && !is_array($v)){
				$content .= $k . '=' . $v . '&';
			}
		}
		return trim($content, '&');
	}

	/**
	 * 调用执行接口
	 * @param mixed $params
	 * @param string $method
	 * @return mixed
	 */
	public function execute($params, $format = 'XML')
	{
		$result = parent::execute($params, $format);
		return $result;
	}

	/**
	 * 检查是否执行成功
	 * @param array $result
	 * @return boolean
	 */
	protected function __checkResult($result)
	{
		return true;
	}
	
	/**
	 * 获取错误信息
	 * @param array $result
	 * @return string
	 */
	protected function __getError($result)
	{
		return '';
	}

	/**
	 * 获取错误代码
	 * @param array $result
	 * @return string
	 */
	protected function __getErrorCode($result)
	{
		return '';
	}
}