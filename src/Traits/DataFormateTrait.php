<?php
// +----------------------------------------------------------------------
// | 充值公用模块
// +----------------------------------------------------------------------
// | Author: Michael
// +----------------------------------------------------------------------
// | date: 2019-04-11
// +----------------------------------------------------------------------

namespace MicroTool\BasePower\Traits;


trait DataFormateTrait
{

    /**
     * 返回固定格式数据
     * @param $code 错误状态码 1是无错误，其它是有错误
     * @param string $msg 提示信息
     * @param array $data 返回数据
     * @param array|string $ext 扩展
     * @return array
     */
    protected function formateData($code, $msg = '', $data = '', $ext = '')
    {
        return formateData($code, $msg, $data, $ext);
    }

    /**
     * 将数据输出，用于接口
     * @param $code 错误状态码 0是无错误，其它是有错误
     * @param string $msg 提示信息
     */
    protected function throwData(int $code, $msg = '')
    {
        throw new \Exception($msg, $code);
    }


}
