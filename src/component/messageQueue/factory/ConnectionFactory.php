<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-26 14:55
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\factory;

use by\component\messageQueue\core\Binding;
use by\component\messageQueue\core\Channel;
use by\component\messageQueue\core\Connection;
use by\component\messageQueue\core\Queue;
use by\component\messageQueue\interfaces\ExchangeInterface;
use by\component\messageQueue\message\BaseMessage;
use by\infrastructure\helper\ArrayHelper;

class ConnectionFactory
{

    // member function

    /**
     * 目前一个连接对象
     * @var Connection
     *
     */
    private $connection;
    /**
     * @var
     * 一个channel
     */
    private $channel;

    public function __construct($host, $username = '', $password = '', $vhost = '/', $port = '5672')
    {
        $this->connection = new Connection($host, $username, $password, $vhost, $port);
    }

    public function __destruct()
    {
        $this->close();
    }

    public function close()
    {
        if ($this->getAMQPChannel()) {
            $this->getAMQPChannel()->close();
        }
        if ($this->getAMQPConnection()) {
            $this->getAMQPConnection()->close();
        }
    }

    public function getAMQPChannel()
    {
        return $this->getChannel()->getAMQPChannel();
    }

    /**
     *
     * @return Channel
     */
    public function getChannel()
    {
        if (!$this->channel) {
            $this->channel = new Channel($this);
            // TODO chanel 创建 增加参数
            $this->channel->create();
        }

        return $this->channel;
    }

    public function getAMQPConnection()
    {
        return $this->connection->getConnection();
    }

    public function basicSend(BaseMessage $message, Binding $binding)
    {
        $msg = AMQPMessage();
        $this->getAMQPChannel()->basic_publish($message->getBody(), $binding->getExchange(), $binding->getRoutingKey());
    }

    /**
     * 绑定生效 队列x交换机
     * @param Binding $binding
     * @return mixed|null
     */
    public function binding(Binding $binding)
    {
        return $this->getAMQPChannel()->queue_bind($binding->getQueueName(), $binding->getExchange(), $binding->getRoutingKey(), $binding->getNowait());
    }

    /**
     * 创建一个队列
     * @param Queue $queue
     * @return mixed|null
     */
    public function declareQueue(Queue $queue)
    {
        return $this->getAMQPChannel()->queue_declare($queue->getName(), $queue->getPassive(), $queue->getDurable(), $queue->getExclusive(), $queue->getAutoDelete(), $queue->getNowait(), $queue->getArguments());
    }

    /**
     * 声明一个交换机
     * @param ExchangeInterface $exchange
     * @return mixed|null
     */
    public function declareExchange(ExchangeInterface $exchange)
    {
        $arguments = $exchange->getArguments();
        $instance = ArrayHelper::getInstance()->from($arguments);
        $passive = $instance->defaultValue(false)->getValueBy('passive');
        $durable = $instance->defaultValue(false)->getValueBy('durable');
        $autoDelete = $instance->defaultValue(true)->getValueBy('auto_delete');
        $internal = $instance->defaultValue(false)->getValueBy('internal');
        $nowait = $instance->defaultValue(false)->getValueBy('nowait');
        $ticket = $instance->defaultValue(null)->getValueBy('ticket');
        ArrayHelper::filter($arguments, ['passive', 'durable', 'auto_delete']);

        return $this->getAMQPChannel()->exchange_declare($exchange->getName(), $exchange->getExchangeType(), $passive, $durable, $autoDelete, $internal, $nowait, $arguments, $ticket);
    }

    // construct

    /**
     *
     * @return Channel
     */
    public function getNewChannel()
    {
        $this->channel = new Channel($this);
        return $this->channel;
    }

    // override function __toString()

    // member variables

    public function getConnection()
    {
        return $this->connection;
    }

    public function setUsername($username)
    {
        $this->connection->setUsername($username);
    }

    // getter setter

}