<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 11:20
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\infrastructure\base;


use by\infrastructure\SetDataHelper;
use by\interfaces\ToJsonStringInterfaces;

class BaseJsonObject extends BaseObject implements ToJsonStringInterfaces
{

    // member function
    function toJsonString()
    {
        $data = SetDataHelper::getDataArrayFrom($this);
        return json_encode($data);
    }

    // override function __toString()

    public function __toString()
    {
        return $this->toJsonString();
    }

    // member variables

    // getter setter

}