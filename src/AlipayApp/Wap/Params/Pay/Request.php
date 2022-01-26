<?php

namespace Yurun\PaySDK\AlipayApp\Wap\Params\Pay;

use Yurun\PaySDK\AlipayRequestBase;

/**
 * 支付宝手机支付下单请求类.
 */
class Request extends AlipayRequestBase
{
    /**
     * 接口名称.
     *
     * @var string
     */
    public $method = 'alipay.trade.wap.pay';

    /**
     * 同步返回地址，HTTP/HTTPS开头字符串.
     *
     * @var string
     */
    public $return_url;

    /**
     * 支付宝服务器主动通知商户服务器里指定的页面http/https路径。
     *
     * @var string
     */
    public $notify_url;
    
    /**
     * 详见：https://opendocs.alipay.com/isv/10467/xldcyq.
     *
     * @var string
     */
    public $app_auth_token;

    /**
     * 业务请求参数
     * 参考https://docs.open.alipay.com/203/107090/.
     *
     * @var \Yurun\PaySDK\AlipayApp\Wap\Params\Pay\BusinessParams
     */
    public $businessParams;

    public function __construct()
    {
        $this->businessParams = new BusinessParams();
        $this->_method = 'GET';
    }
}
