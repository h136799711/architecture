<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-12-12 14:38
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\helper;


use by\infrastructure\helper\CallResultHelper;
use by\infrastructure\helper\Object2DataArrayHelper;

class ReflectionHelper
{
    /**
     * 使用传入数据调用方法
     * @param object $object 对象
     * @param string $methodName 方法名
     * @param array $data 传入参数值数据
     * @return \by\infrastructure\base\CallResult
     */
    public static function invokeWithArgs($object, $methodName = 'index', $data = [])
    {
        $ref = new \ReflectionClass($object);
        try {
            $method = $ref->getMethod($methodName);
            if (!$method->isPublic()) {
                return CallResultHelper::fail(lang('err_access_not_public_method'));
            }
            $params = $method->getParameters();
            var_dump($params);
            $args = [];
            foreach ($params as $vo) {
                if ($vo instanceof \ReflectionParameter) {
                    $paramName = $vo->getName();
                    $cls = $vo->getClass();

                    if ($cls) {
                        $clsName = $cls->getName();
                        $value = new $clsName;
                        Object2DataArrayHelper::setData($value, $data);
                    } elseif (array_key_exists($paramName, $data)) {
                        $value = $data[$paramName];
                    } else {
                        $value = $vo->getDefaultValue();
                    }

                    array_push($args, $value);
                }
            }

            $result = $method->invokeArgs($object, $args);
            return $result;

        } catch (\ReflectionException $exception) {
            return CallResultHelper::fail($exception->getMessage());
        }
    }


}