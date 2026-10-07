<?php

namespace Yurun\PaySDK\AlipayApp\Params\Complaint;

/**
 * 支付宝投诉明细查询
 */
class BusinessParams
{
    use \Yurun\PaySDK\Traits\JSONParams;

    /**
     * current_page_num ，当前页码，默认1。
     *
     * @var number
     */
    public $current_page_num;

    /**
     * 分页查询每次查询的数据量，不传则默认为10，取值单位为条
     *
     * @var number
     */
    public $page_size;

    /**
     * 按投诉时间范围进行查询：时间范围的下界，取值单位为秒
     *
     * @var string
     */
    public $gmt_complaint_start;

    /**
     * 按投诉时间范围进行查询：时间范围的上界，取值单位为秒
     *
     * @var string
     */
    public $gmt_complaint_end;

    /**
     * 交易单号
     *
     * @var string
     */
    public $trade_no;

    /**
     * 投诉状态列表
     * 可选值: ["DROP_COMPLAIN","OVERDUE","WAIT_PROCESS"]
     *
     * @var array
     */
    public $status_list;

    /**
     * 开始处理时间
     *
     * @var string
     */
    public $gmt_process_start;

    /**
     * 处理时间区间终点
     *
     * @var string
     */
    public $gmt_process_end;

    /**
     * 投诉单号
     * 长度限制: string(128)
     *
     * @var string
     */
    public $task_id;

    /**
     * 投诉单号列表
     * 长度限制: string[](256)
     * 示例值: ["10243351927","10243351912","10243351234"]
     *
     * @var array
     */
    public $task_id_list;
}
