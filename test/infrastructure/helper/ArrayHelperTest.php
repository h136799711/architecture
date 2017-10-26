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
    /**
     * @covers ArrayHelper::filter
     * @uses   ArrayHelper
     * @group helper
     * @group ArrayHelper
     */
    public function testFilter()
    {
        $data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $data2 = ['k1' => 1, 'k2' => 2, 'k3' => 3, 'k4' => 4];
        $key = [3, 4, 5, 6];
        $key2 = ['k2', 'k3'];
        $lengthOfData = count($data);
        $lengthOfData2 = count($data2);
        ArrayHelper::filter($data, $key);
        $this->assertEquals($lengthOfData - count($key), count($data));
        ArrayHelper::filter($data2, $key2);
        $this->assertEquals($lengthOfData2 - count($key2), count($data2));
    }

    /**
     * @covers ArrayHelper::setValue()
     * @uses   ArrayHelper
     * @group helper
     * @group ArrayHelper
     */
    public function testSetValue()
    {
        $obj = new \stdClass();
        $obj->id = 123456;
        $_POST = [''];
        $arr = [0, 1, 2, 3];
        $data = ['id' => $obj, 'username' => 'hebidu', 'password' => '123456', 'test' => $arr];
        ArrayHelper::setValue($username, $data, 'default', get_defined_vars());
        $this->assertEquals('hebidu', $username);
        ArrayHelper::setValue($password, $data, 'default', get_defined_vars());
        $this->assertEquals('123456', $password);
        ArrayHelper::setValue($test, $data, 'default', get_defined_vars());
        $this->assertEquals($arr, $test);
        ArrayHelper::setValue($id, $data, 'default', get_defined_vars());
        $this->assertEquals($obj, $id);
    }

    // override function __toString()

    // member variables

    // getter setter

}