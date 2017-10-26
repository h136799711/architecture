<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-25 16:30
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\impl;


use by\infrastructure\helper\ArrayHelper;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

/**
 *
 * Class RabbitMqPublisher
 * @package by\component\messageQueue\impl
 */
class RabbitMqPublisher extends Publisher
{

    // member function
    /**
     * 创建链接
     * 配置
     * [
     *  'host'=>'rabbitmq主机地址',
     *  'user'=>'用户名',
     *  'password'=>'密码',
     *  'vhost'=>'虚拟主机', //可不传,默认为/
     *  'port'=>'端口', // 可不传,默认为5672
     * ]
     * @param array $config
     * @throws \Exception
     */
    public function createConnection($config = [])
    {
        if (!array_key_exists('host', $config) || !(array_key_exists('user', $config)) || !array_key_exists('password', $config)) {
            throw new \Exception('host,user,password missing');
        }

        $host = $config['host'];
        $user = $config['user'];
        $password = $config['password'];
        $vhost = ArrayHelper::getValue('vhost', $config, '/');
        $port = ArrayHelper::getValue('port', $config, '5672');;
        $this->connection = new AMQPStreamConnection($host, $port, $user, $password, $vhost);

    }

    public function createChannel($config = [])
    {
        if ($this->connection) {
            $channel_id = ArrayHelper::getValue('channel_id', $config, null);
            $this->channel = $this->connection->channel($channel_id);
        }
    }

    function createExchange($config = [])
    {
    }

    function createQueue()
    {
        // TODO: Implement createQueue() method.
    }

    public function publish($params)
    {
        if ($this->channel) {
            $mandatory = ArrayHelper::getValue('mandatory', $params, false);
            $immediate = ArrayHelper::getValue('immediate', $params, false);;
            $ticket = ArrayHelper::getValue('ticket', $params, null);
            $this->channel->basic_publish($this->msg, $this->getExchange(), $this->getRoutingKey(), $mandatory, $immediate, $ticket);
        }
    }

    /**
     * 初始化连接，同时创建一个channel
     * @param array $config keys=host,user,password,vhost,port
     */
    public function init($config = [])
    {

        $this->channel = $this->connection->channel();
    }

    /**
     * 重新连接如果断开了链接
     */
    public function reconnect()
    {
        if (!$this->connection->isConnected()) {
            $this->connection->reconnect();
        }
    }

    /**
     * 创建新的channel，返回旧的channel
     * @return AMQPChannel
     */
    public function newChannel()
    {
        $channel = $this->channel;
        $this->channel = $this->connection->channel();
        return $channel;
    }

    /**
     * 声明一个队列
     * @param string $queue 队列名称 [应用.模块.方法.业务状态] common.user.register.success
     * @param boolean $passive 设置为true 则会检查是否存在名为 $queue的队列
     * @param boolean $durable 是否持久化
     * @param boolean $exclusive 排他队列，只可以在本次的连接Connection中被访问
     * @param boolean $auto_delete 是否自动删除。在最后一个connection断开的时候
     * @param boolean $nowait 是否异步创建队列
     * @param array $arguments
     * @param string $ticket
     */
    public function declareQueue($queue = '',
                                 $passive = false,
                                 $durable = false,
                                 $exclusive = false,
                                 $auto_delete = true,
                                 $nowait = false,
                                 $arguments = null,
                                 $ticket = null)
    {
        $this->channel->queue_declare($queue, $passive, $durable, $exclusive, $auto_delete, $nowait, $arguments, $ticket);
    }

    /**
     * 关闭通道
     */
    public function closeAll()
    {
        if ($this->channel) {
            $this->channel->close();
        }

        if ($this->connection) {
            $this->connection->close();
        }
    }

    // construct
    public function __construct($config = [])
    {
        $this->setExchange('');
        $this->setRoutingKey('');
    }

    // override function __toString()

    // member variables
    /**
     * @var AMQPStreamConnection
     *
     * User: ${USER}
     * Date: ${DATE}
     * Time: ${TIME}
     */
    private $connection;
    /**
     * @var  AMQPChannel
     *
     */
    private $channel;
    /**
     * @var AMQPMessage
     */
    private $msg;
    /**
     * @var string 交换机名称
     *
     */
    private $exchange;
    /**
     * @var string 路由键名称
     *
     */
    private $routingKey;


    // getter setter

    /**
     * @return string
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    /**
     * @param string $exchange
     */
    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
    }

    /**
     * @return string
     */
    public function getRoutingKey()
    {
        return $this->routingKey;
    }

    /**
     * @param string $routingKey
     */
    public function setRoutingKey($routingKey)
    {
        $this->routingKey = $routingKey;
    }

    /**
     * @return AMQPMessage
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * 设置发布的消息内容
     * @param string $body
     */
    public function setMsg($body = '', $properties = array())
    {
        $this->msg = new AMQPMessage($body, $properties);
    }


    /**
     * @return AMQPStreamConnection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param AMQPStreamConnection $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return AMQPChannel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param AMQPChannel $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

}