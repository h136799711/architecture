<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 13:45
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\securityCode\constants;


class SecurityCodeGenerateType
{

    // member variables

    /**
     * 仅字母大小写
     */
    const ALPHABET = 1;

    /**
     * 字母 + 数字
     */
    const ALPHABET_AND_NUMBERS = 2;

    /**
     * 仅数字
     */
    const NUMBERS = 3;

    // getter setter

}