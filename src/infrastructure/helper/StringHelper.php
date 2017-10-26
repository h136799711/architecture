<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-24 16:25
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\infrastructure\helper;

/**
 * 字符串帮助类
 * Class StringHelper
 * @package by_infrastructure
 */
class StringHelper
{

    // member function

    private static $codeSet = '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY';

    public function __construct()
    {
        // TODO construct
    }

    /**
     * 支持随机生成只包含数字的随机字符串长度为1-8
     * @param int $length
     * @return int
     */
    public static function randNumbers($length = 6)
    {
        if ($length < 0) $length = 1;
        if ($length > 8) $length = 8;
        $start = pow(10, $length - 1);
        return mt_rand($start, ($start * 10) - 1);
    }

    /**
     * 随机字母+数字
     * @param $length
     * @return string
     */
    public static function randAlphabetAndNumbers($length)
    {
        if ($length < 0) $length = 1;
        if ($length > 64) $length = 64;
        $code = [];
        for ($i = 0; $i < $length; $i++) {
            $code[$i] = self::$codeSet[mt_rand(0, strlen(self::$codeSet) - 1)];
        }
        return implode("", $code);
    }

    // construct

    /**
     * 返回uniqid的md5值
     * @return string
     */
    public static function md5UniqueId()
    {
        return md5(uniqid());
    }

    // override function __toString()

    // member variables

    /**
     *
     * @param $type
     * @param int $length
     * @author hebidu <email:346551990@qq.com>
     * @modify 2017-10-24 16:26:30
     */
    public static function randStr($type, $length = 6)
    {
        // TODO 生成随机长度的字符串

    }


    // getter setter

}