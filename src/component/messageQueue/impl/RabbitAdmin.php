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


use by\component\messageQueue\core\Binding;
use by\component\messageQueue\core\exchanges\TopicExchange;
use by\component\messageQueue\core\Queue;
use by\component\messageQueue\factory\ConnectionFactory;
use by\component\messageQueue\message\BaseMessage;

class RabbitAdmin
{

    // member function

    private $connectionFactory;
    private $currentQueue;
    private $currentExchange;

    public function __destruct()
    {
        $this->connectionFactory->close();

    }

    public function __construct(ConnectionFactory $factory)
    {
        $this->connectionFactory = $factory;
    }

    /**
     * 队列名称
     * @param string $queue
     * @return Queue
     */
    public function declareQueue($queue)
    {
        $this->currentQueue = new Queue($queue);
        $this->connectionFactory->declareQueue($this->currentQueue);
        return $this->currentQueue;
    }

    /**
     * 交换机
     * @param $exchangeName
     * @return TopicExchange
     */
    public function declareTopicExchange($exchangeName)
    {
        $this->currentExchange = new TopicExchange($exchangeName);
        $this->connectionFactory->declareExchange($this->currentExchange);
        return $this->currentExchange;
    }

    public function bind(Binding $binding)
    {
        $this->connectionFactory->binding($binding);
    }

    /**
     * 订阅
     * @param Binding $binding
     * @param null $callback
     */
    public function subscribe(Binding $binding, $callback = null)
    {
        $this->connectionFactory->basicConsumer($binding, $callback);
    }

    /**
     * 发布
     * @param BaseMessage $message
     * @param Binding $binding
     */
    public function publish(BaseMessage $message, Binding $binding)
    {
        $this->connectionFactory->basicSend($message, $binding);
    }

    public function close()
    {

    }

}