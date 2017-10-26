<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-26 15:02
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\impl;


use by\component\messageQueue\factory\ConnectionFactory;
use by\component\messageQueue\message\BaseMessage;

class RabbitAdmin
{

    // member function

    /**
     * 订阅
     */
    public function subscribe()
    {

    }

    /**
     * 发布
     * @param BaseMessage $message
     */
    public function publish(BaseMessage $message)
    {

    }

    /*
     * 声明一个队列
     */
    public function declareQueue()
    {

    }

    /**
     * 声明一个交换机
     */
    public function declareExchange()
    {

    }

    // construct
    public function __construct(ConnectionFactory $factory)
    {
        $this->connectionFactory = $factory;
    }

    // override function __toString()

    // member variables
    private $connectionFactory;

    // getter setter

}