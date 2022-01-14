<?php
// +----------------------------------------------------------------------
// | 公共函数
// +----------------------------------------------------------------------
// | Copyright (c) 义幻科技 http://www.mobimedical.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Michael23
// +----------------------------------------------------------------------
// | date: 2022-01-14
// +----------------------------------------------------------------------

use Hyperf\Utils\ApplicationContext;

if (!function_exists('app')) {
    /**
     * 通过容器获取对象
     * @param string $name 对象唯一名称
     */
    function app(string $name, array $parameters = [], $instance = false)
    {
        if ($instance === true) {
            return make($name, $parameters);
        }
        if (ApplicationContext::hasContainer()) {
            $container = ApplicationContext::getContainer();
            if (method_exists($container, 'get')) {
                return $container->get($name);
            }
        }

        return new $name(...$parameters);


    }
}

if (!function_exists('formateData')) {
    /**
     * 返回数据的格式
     * @param $code 错误状态码 1是无错误，其它是有错误
     * @param string $msg 提示信息
     * @param array|string $data 数据
     * @param array|string $ext 扩展
     * @return array
     */
    function formateData(int $code, $msg = '', $data = '', $ext = '')
    {
        if (empty($msg)) {
            $msg = $code == 1 ? 'success' : 'fail';
        }

        $returnArr         = [];
        $returnArr['code'] = $code;
        $returnArr['msg']  = $msg;
        $returnArr['data'] = $data;
        $returnArr['ext']  = $ext;
        return $returnArr;
    }
}
