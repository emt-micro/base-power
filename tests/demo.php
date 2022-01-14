<?php
// +----------------------------------------------------------------------
// | 注释
// +----------------------------------------------------------------------
// | Copyright (c) 义幻科技 http://www.mobimedical.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Michael23
// +----------------------------------------------------------------------
// | date: 2021-10-09
// +----------------------------------------------------------------------

require '../vendor/autoload.php';


class test
{
    use \MicroTool\BasePower\Traits\DataFormateTrait, \MicroTool\BasePower\Traits\RequestsTrait;

    function formateDataDemo()
    {
        print_r($this->formateData(1, 'hello world'));
    }

    function requestsTraitDemo()
    {
        var_dump($this->reqPost('http://www.baidu.com'));
    }
}

(new test())->formateDataDemo();
(new test())->requestsTraitDemo();
