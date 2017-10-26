<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-26 14:30
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\core;


class Queue
{

    // member function

    // construct
    /**
     * Queue constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    // override function __toString()

    private $name;
    private $durable;
    private $exclusive;
    private $autoDelete;
    private $arguments;


    // getter setter

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDurable()
    {
        return $this->durable;
    }

    /**
     * @param mixed $durable
     */
    public function setDurable($durable)
    {
        $this->durable = $durable;
    }

    /**
     * @return mixed
     */
    public function getExclusive()
    {
        return $this->exclusive;
    }

    /**
     * @param mixed $exclusive
     */
    public function setExclusive($exclusive)
    {
        $this->exclusive = $exclusive;
    }

    /**
     * @return mixed
     */
    public function getAutoDelete()
    {
        return $this->autoDelete;
    }

    /**
     * @param mixed $autoDelete
     */
    public function setAutoDelete($autoDelete)
    {
        $this->autoDelete = $autoDelete;
    }

    /**
     * @return mixed
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param mixed $arguments
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }


}