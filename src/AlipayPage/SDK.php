<?php
namespace Yurun\PaySDK\AlipayPage;

use \Yurun\PaySDK\Base;

class SDK extends Base
{
	/**
	 * 公共参数
	 * @var \Yurun\PaySDK\AlipayPage\Params\PublicParams
	 */
	public $publicParams;

	/**
	 * 处理执行接口的数据
	 * @param $params
	 * @param &$data
	 * @param &$url
	 * @return array
	 */
	public function __parseExecuteData($params, &$data, &$url)
	{
		$data = \array_merge((array)$this->publicParams, (array)$params);
		unset($data['apiDomain'], $data['appID'], $data['businessParams'], $data['appPrivateKey'], $data['appPrivateKeyFile']);
		$data['app_id'] = $this->publicParams->appID;
		$data['biz_content'] = $params->businessParams->toString();
		$data['timestamp'] = date('Y-m-d H:i:s');
		$data['sign'] = $this->sign($data);
		$url = $this->publicParams->apiDomain;
	}

	public function sign($data)
	{
		$content = $this->parseSignData($data);
		if(empty($this->publicParams->appPrivateKeyFile))
		{
			$key = $this->publicParams->appPrivateKey;
			$method = 'encryptPrivate';
		}
		else
		{
			$key = $this->publicParams->appPrivateKeyFile;
			$method = 'encryptPrivateFromFile';
		}
		switch($this->publicParams->sign_type)
		{
			case 'RSA':
				$result = \Yurun\PaySDK\Lib\Encrypt\RSA::$method($content, $key);
				break;
			case 'RSA2':
				$result = \Yurun\PaySDK\Lib\Encrypt\RSA2::$method($content, $key);
				break;
			default:
				throw new \Exception('未知的加密方式：' . $this->publicParams->sign_type);
		}
		return \base64_encode($result);
	}
	
	/**
	 * 验证回调通知是否合法
	 * @param $data
	 * @return bool
	 */
	public function verifyCallback($data)
	{
		if(!isset($data['sign'], $data['sign_type']))
		{
			return false;
		}
		unset($data['sign_type']);
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
			case 'RSA':
				return \Yurun\PaySDK\Lib\Encrypt\DSA::$method($content, $key, \base64_decode($data['sign']));
			case 'RSA2':
				return \Yurun\PaySDK\Lib\Encrypt\RSA2::$method($content, $key, \base64_decode($data['sign']));
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
		$responseName = $params->_syncResponseName;
		$content = \json_encode($data[$responseName], JSON_UNESCAPED_UNICODE);
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
			case 'RSA':
				return \Yurun\PaySDK\Lib\Encrypt\DSA::$method($content, $key, \base64_decode($data['sign']));
			case 'RSA2':
				return \Yurun\PaySDK\Lib\Encrypt\RSA2::$method($content, $key, \base64_decode($data['sign']));
			default:
				throw new \Exception('未知的加密方式：' . $this->publicParams->sign_type);
		}
	}

	public function parseSignData($data)
	{
		unset($data['sign']);
		\ksort($data);
		$content = '';
		foreach ($data as $k => $v){
			if($v != "" && !is_array($v)){
				$content .= $k . "=" . $v . "&";
			}
		}
		return trim($content, '&');
	}
}