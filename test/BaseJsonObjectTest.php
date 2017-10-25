<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 11:26
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace byTest\infrastructure\base;

use by\infrastructure\helper\Object2DataArrayHelper;
use PHPUnit\Framework\TestCase;

class BaseJsonObjectTest extends TestCase
{

    // member function
    /**
     * 
     * @uses   \by\infrastructure\helper\Object2DataArrayHelper
     */
    public function testJsonObject(){
        $test = new BaseJsonObjectTest();
        $test->setId('11');
        $test->setToLower('lower');
        $test->setToUpper('upper');
        $array = Object2DataArrayHelper::getDataArrayFrom($test,['id','to_upper']);
        $this->assertArrayHasKey('to_upper', $array);
        $this->assertArrayHasKey('id', $array);
        $array = Object2DataArrayHelper::getDataArrayFrom($test);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('to_upper', $array);
        $this->assertArrayNotHasKey('toUpper', $array);
        $array = Object2DataArrayHelper::getDataArrayFrom($test,['id','toUpper','to_upper']);
        $this->assertArrayHasKey('toUpper', $array);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayNotHasKey('to_upper', $array);

    }

    // override function __toString()

    // member variables
    private $id;
    private $toUpper;
    private $toLower;

    // getter setter
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getToUpper()
    {
        return $this->toUpper;
    }

    /**
     * @param mixed $toUpper
     */
    public function setToUpper($toUpper)
    {
        $this->toUpper = $toUpper;
    }

    /**
     * @return mixed
     */
    public function getToLower()
    {
        return $this->toLower;
    }

    /**
     * @param mixed $toLower
     */
    public function setToLower($toLower)
    {
        $this->toLower = $toLower;
    }


}