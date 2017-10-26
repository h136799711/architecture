<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 16:20
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\message;

/*
 * 基础队列消息对象
 * @author hebidu <email:346551990@qq.com> 
 * @modify 2017-10-26 13:44:00
 */
abstract class BaseMessage
{

    // member function
    abstract function convert();

    // construct
    private $topic;
    // member variables
    private $body;

    public function __construct()
    {
        // TODO construct
    }

    // getter setter

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

}