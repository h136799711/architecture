<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 14:27
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\infrastructure\base;


use by\infrastructure\helper\Object2DataArrayHelper;

class CallResult extends BaseCallResult
{

    // member function

    // construct
    public function __construct($data = '', $msg = '', $code = 0)
    {
        parent::__construct($data, $msg, $code);
    }

    // override function __toString()
    public function __toString()
    {
        return json_encode(Object2DataArrayHelper::getDataArrayFrom($this));
    }

    // member variables

    // getter setter

}