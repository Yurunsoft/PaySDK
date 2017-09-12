<?php
namespace Yurun\PaySDK;

use \Yurun\Until\HttpRequest;
use Yurun\PaySDK\Lib\XML;

abstract class Base
{
	/**
	 * HttpRequest
	 * @var \Yurun\Until\HttpRequest
	 */
	public $http;

	/**
	 * 接口请求的返回结果
	 * @var \Yurun\Until\HttpResponse
	 */
	public $response;

	/**
	 * 请求数据
	 * @var array
	 */
	public $requestData;

	/**
	 * 公共参数
	 * @var mixed
	 */
	public $publicParams;

	public function __construct($publicParams)
	{
		$this->publicParams = $publicParams;
		$this->http = new HttpRequest;
	}

	/**
	 * 调用执行接口
	 * @param mixed $params
	 * @param string $method
	 * @return mixed
	 */
	public function execute($params, $format = 'JSON')
	{
		$this->prepareExecute($params, $url, $data);
		$this->response = $this->http->send($url, $this->requestData, $params->_method);
		switch($format)
		{
			case 'JSON':
				$result = \json_decode($this->response->body, true);
				break;
			case 'XML':
				$result = XML::fromString($this->response->body);
				break;
			default:
				$result = $this->response->body;
		}
		if($params->_isSyncVerify && !$this->verifySync($params, $result))
		{
			throw new \Exception('同步返回数据验证失败');
		}
		else
		{
			return $result;
		}
	}

	/**
	 * 签名
	 * @param array $data
	 * @return string
	 */
	public abstract function sign($data);

	/**
	 * 处理执行接口的数据
	 * @param $params
	 * @param &$data 数据数组
	 * @param &$requestData 请求用的数据，格式化后的
	 * @param &$url 请求地址
	 * @return array
	 */
	public abstract function __parseExecuteData($params, &$data, &$requestData, &$url);

	/**
	 * 验证回调通知是否合法
	 * @param $data
	 * @return bool
	 */
	public abstract function verifyCallback($data);

	/**
	 * 验证同步返回内容
	 * @param mixed $params
	 * @param array $data
	 * @return bool
	 */
	public abstract function verifySync($params, $data);

	/**
	 * 使用跳转的方式处理
	 * @param array $params
	 * @return void
	 */
	public function redirectExecute($params)
	{
		$this->__parseExecuteData($params, $data, $requestData, $url);
		if(false === strpos($url, '?'))
		{
			$url .= '?';
		}
		else
		{
			$url .= '&';
		}
		$this->requestData = $data;
		$url .= \http_build_query($data);
		header('HTTP/1.1 302 Temporarily Moved');
		header('Status: 302 Temporarily Moved');
		header('Location: ' . $url);
	}

	/**
	 * 准备处理数据
	 * @param string $params
	 * @param string $url
	 * @param array $data
	 * @return void
	 */
	public function prepareExecute($params, &$url = null, &$data = null)
	{
		$this->__parseExecuteData($params, $data, $requestData, $url);
		$this->requestData = $requestData;
		if('GET' === $params->_method)
		{
			if(false === strpos($url, '?'))
			{
				$url .= '?';
			}
			else
			{
				$url .= '&';
			}
			$url .= \http_build_query($data);
		}
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $notifyHandle
	 * @return void
	 */
	public function notify($notifyHandle)
	{
		$notifyHandle->sdk = $this;
		$notifyHandle->exec();
	}
}