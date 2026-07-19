<?php

namespace Yurun\PaySDK\AlipayApp\Params\Complaint;

use Yurun\PaySDK\AlipayRequestBase;

/**
 * 支付宝投诉明细查询
 */
class Request extends AlipayRequestBase
{
    /**
     * 接口名称.
     *
     * @var string
     */
    public $method = 'alipay.security.risk.complaint.info.batchquery';

    /**
     * 详见：https://opendocs.alipay.com/open/8ad1ac86_alipay.security.risk.complaint.info.batchquery
     *
     * @var string
     */
    public $app_auth_token;

    /**
     * 业务请求参数
     * 参考https://opendocs.alipay.com/open/8ad1ac86_alipay.security.risk.complaint.info.batchquery
     *
     * @var \Yurun\PaySDK\AlipayApp\Params\Complaint\BusinessParams
     */
    public $businessParams;

    public function __construct()
    {
        $this->businessParams = new BusinessParams();
        $this->_method = 'GET';
        $this->_isSyncVerify = true;
        $this->_syncResponseName = 'alipay_security_risk_complaint_info_batchquery_response';
    }
}
