<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 13:43
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\securityCode\impl;


use by\component\securityCode\interfaces\SecurityCodeActionInterface;

class SecurityCodeAction implements SecurityCodeActionInterface
{

    // member function
    public function create()
    {
        // TODO: Implement create() method.
    }

    public function verify()
    {
        // TODO: Implement verify() method.
    }


    // construct
    public function __construct()
    {
        // TODO construct
    }

    // override function __toString()

    // member variables
    private $generateWay;

    // getter setter

    /**
     * @return mixed
     */
    public function getGenerateWay()
    {
        return $this->generateWay;
    }

    /**
     * @param mixed $generateWay
     */
    public function setGenerateWay($generateWay)
    {
        $this->generateWay = $generateWay;
    }
}