<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017-06-14
 * Time: 11:24
 */

namespace by\sdk\base;

use by\sdk\helper\ByConfigHelper;
use by\sdk\helper\ByCurlHelper;
use by\sdk\helper\ByLangHelper;

abstract class ByBaseRequest
{
    private static $config;
    private static $curlHelper;

    public function __construct($config = [])
    {
        // 读取配置信息
        $instance = ByConfigHelper::getInstance($config);
        self::$config = $instance::$config;
        self::$curlHelper = new ByCurlHelper(self::$config);
        // 设置语言
        ByLangHelper::setLang(self::$config['lang']);
        // 设置时区
        date_default_timezone_set(self::$config['default_timezone']);
    }

    protected function callRemote($data)
    {
        return self::$curlHelper->callRemote($data);
    }

    protected function getNotifyId()
    {
        return time();
    }

    protected function merge($data1, $data2)
    {
        unset($data2['type']);
        unset($data2['api_ver']);
        unset($data2['api_type']);
        unset($data2['client_id']);
        unset($data2['session_id']);

        return array_merge($data1, $data2);
    }
}