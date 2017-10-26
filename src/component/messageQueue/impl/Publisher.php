<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 16:07
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\impl;


use by\component\messageQueue\interfaces\PublisherInterface;

/**
 * Class Publisher
 *
 * 创建连接-->创建channel-->创建交换机对象-->发送消息
 * @package by\component\messageQueue\impl
 */
abstract class  Publisher implements PublisherInterface
{

    // member function
    abstract function createConnection($config = []);

    abstract function createChannel($config = []);

    abstract function createExchange($config = []);

    abstract function createQueue($config = []);

    abstract function closeAll();

    // construct
    public function __construct()
    {
        // TODO construct
    }

    // override function __toString()

    // member variables

    // getter setter

}