<?php
namespace Yurun\PaySDK\Weixin;

use \Yurun\PaySDK\Base;
use Yurun\PaySDK\Lib\XML;
use Yurun\PaySDK\Lib\ObjectToArray;

class SDK extends Base
{
	/**
	 * 公共参数
	 * @var \Yurun\PaySDK\Weixin\Params\PublicParams
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
		$data = \array_merge(ObjectToArray::parse($this->publicParams), ObjectToArray::parse($params));
		unset($data['apiDomain'], $data['appID'], $data['businessParams'], $data['_apiMethod'], $data['key'], $data['_method'], $data['_isSyncVerify'], $data['certPath'], $data['keyPath'], $data['needSignType']);
		$data['appid'] = $this->publicParams->appID;
		$data['nonce_str'] = \md5(\uniqid('', true));
		if(!$params->needSignType)
		{
			unset($data['sign_type']);
		}
		foreach($data as $key => $value)
		{
			if(\is_object($value) && \method_exists($value, 'toString'))
			{
				$data[$key] = $value->toString();
			}
		}
		$data['sign'] = $this->sign($data);
		$requestData = $this->parseDataToXML($data);
		if(false === strpos($params->_apiMethod, '://'))
		{
			$url = $this->publicParams->apiDomain . $params->_apiMethod;
		}
		else
		{
			$url = $params->_apiMethod;
		}
	}

	/**
	 * 把数组处理为xml
	 * @param array $data
	 * @return string
	 */
	public function parseDataToXML($data)
	{
		return XML::toString($data);
	}

	/**
	 * 签名
	 * @param $data
	 * @return string
	 */
	public function sign($data)
	{
		$content = $this->parseSignData($data);
		switch($this->publicParams->sign_type)
		{
			case 'HMAC-SHA256':
				return strtoupper(hash_hmac('sha256', $content, $this->publicParams->key));
			case 'MD5':
				return strtoupper(md5($content));
			default:
				throw new \Exception('未知的签名方式：' . $this->publicParams->sign_type);
		}
	}
	
	/**
	 * 验证回调通知是否合法
	 * @param $data
	 * @return bool
	 */
	public function verifyCallback($data)
	{
		if(is_string($data))
		{
			$data = XML::fromString($data);
		}
		if(!isset($data['sign']))
		{
			return false;
		}
		$content = $this->parseSignData($data);
		switch($this->publicParams->sign_type)
		{
			case 'HMAC-SHA256':
				return strtoupper(hash_hmac('sha256', $content, $this->publicParams->key)) === $data['sign'];
			case 'MD5':
				return strtoupper(md5($content)) === $data['sign'];
			default:
				throw new \Exception('未知的签名方式：' . $this->publicParams->sign_type);
		}
	}

	/**
	 * 验证同步返回内容
	 * @param mixed $params
	 * @param array $data
	 * @return bool
	 */
	public function verifySync($params, $data)
	{
		return $this->verifyCallback($data);
	}

	public function parseSignData($data)
	{
		unset($data['sign']);
		\ksort($data);
		$data['key'] = $this->publicParams->key;
		$content = '';
		foreach ($data as $k => $v){
			if($v != '' && !is_array($v)){
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
		if(null !== $this->publicParams->certPath)
		{
			$this->http->sslCert($this->publicParams->certPath);
		}
		if(null !== $this->publicParams->keyPath)
		{
			$this->http->sslKey($this->publicParams->keyPath);
		}
		return parent::execute($params, $format);
	}
}