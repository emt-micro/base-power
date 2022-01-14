<?php
// +----------------------------------------------------------------------
// | Requests 二次封装
// +----------------------------------------------------------------------
// | Author: Michael
// +----------------------------------------------------------------------
// | date: 2019-04-17
// +----------------------------------------------------------------------
declare(strict_types=1);

namespace MicroTool\BasePower\Traits;

use GuzzleHttp\Client;
use Hyperf\Guzzle\ClientFactory;

trait RequestsTrait
{

    /**
     * get 请求
     * @param $url 请求链接
     * @param array $headers 头部信息
     * @param array $options 附加条件
     * @return array
     */
    public function reqGet($url, $headers = [], $query = [], $options = [])
    {
        $headers && $options['headers'] = $headers;
        $query && $options['query'] = $query;

        return $this->requests('get', $url, $options);
    }

    /**
     * post 请求方法
     * @param $url 请求地址
     * @param array $headers 头部信息
     * @param array $data 附加条件
     * @return array
     */
    public function reqPost($url, $headers = [], $data = null, $options = [])
    {
        if (is_array($data)) {
            $options['form_params'] = $data;
        } else {
            $options['body'] = $data;
        }

        $options['headers'] = $headers;
        return $this->requests('post', $url, $options);
    }

    /**
     * 发起请求
     * @param $method
     * @param $url
     * @param $headers
     * @param $data
     * @param $options
     * @return array
     */
    public function requests($method, $url, $options = [])
    {
        $options = $this->defaultOptions($options);
        try {
            $res = (new Client($options))->$method($url, $options);
            if ($res->getStatusCode() == 200) {
                return formateData(1, $res->getReasonPhrase(), $res->getBody()->getContents());
            }
            return formateData(0, $res->getReasonPhrase());
        } catch (\Exception $e) {
            return formateData(2, $e->getMessage());
        }
    }


    /**
     * 默认附件条件组合
     * @param $options
     * @return array
     */
    private function defaultOptions($options)
    {
        $optionsDefault = [
            'headers'     => [
                'Content-Type' => 'application/json',
            ],
            'timeout'     => 60
        ];
        $options        = array_merge($optionsDefault, $options);
        return $options;
    }


}
