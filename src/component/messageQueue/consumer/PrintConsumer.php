<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-27 14:30
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\consumer;


use by\component\messageQueue\builder\BindBuilder;
use by\component\messageQueue\config\MQConfig;
use by\component\messageQueue\core\Binding;
use by\component\messageQueue\core\Consumer;
use by\component\messageQueue\core\Queue;
use by\component\messageQueue\facade\RabbitAdmin;
use by\component\messageQueue\factory\ConnectionFactory;
use by\component\messageQueue\interfaces\ConsumerInterface;
use by\component\messageQueue\interfaces\ExchangeInterface;

class PrintConsumer extends Consumer implements ConsumerInterface
{
    public function getQueueName()
    {
        return $this->binding->getQueueName();
    }

    public function getConsumerTag()
    {
        return '';
    }


    /**
     * @var Binding
     */
    private $binding;
    /**
     * @var RabbitAdmin
     */
    private $admin;

    public function __construct(MQConfig $config, $name = '')
    {
        parent::__construct($name);
        // 总控初始化
        $this->admin = new RabbitAdmin(new ConnectionFactory($config->getHost(), $config->getUsername(), $config->getPassword(), $config->getVhost()));
    }

    public function ready(Queue $queue, ExchangeInterface $exchange = null, $routingKey = '')
    {
        // 队列-交换机-绑定关系定义
        $this->binding = BindBuilder::queue($queue)->bind($exchange)->with($routingKey)->build();
        $this->admin->declareExchange($exchange)->declareQueue($queue)->bind($this->binding);
    }

    public function subscribe()
    {
        $this->admin->subscribe($this);
    }

    private static $cnt = 0;

    public function onMessage($msg)
    {
        self::$cnt++;
        echo self::$cnt . ",";

    }


}