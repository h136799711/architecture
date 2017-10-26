<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-26 11:13
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace byTest\infrastructure\helper;


use by\infrastructure\helper\ArrayHelper;
use PHPUnit\Framework\TestCase;

class ArrayHelperTest extends TestCase
{

    // member function
    public function list_by_keys($data, $var1, ...$var)
    {

    }

    /**
     * @covers ArrayHelper::setValue()
     * @uses   ArrayHelper
     * @group helper
     */
    public function testSetValue()
    {
        $obj = new \stdClass();
        $obj->id = 123456;
        $_POST = [''];
        $arr = [0, 1, 2, 3];
        var_dump(get_defined_vars());
        $data = ['id' => $obj, 'username' => 'hebidu', 'password' => '123456', 'test' => $arr];
        ArrayHelper::setValue($username, $data, 'default', get_defined_vars());
        $this->assertEquals('hebidu', $username);
        ArrayHelper::setValue($password, $data, 'default', get_defined_vars());
        $this->assertEquals('123456', $password);
        ArrayHelper::setValue($test, $data, 'default', get_defined_vars());
        $this->assertEquals($arr, $test);
        ArrayHelper::setValue($id, $data, 'default', get_defined_vars());
        $this->assertEquals($obj, $id);
        var_dump(get_defined_vars());
    }

    // override function __toString()

    // member variables

    // getter setter

}