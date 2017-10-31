<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-31 10:20
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\producer;


use by\component\messageQueue\builder\BindBuilder;
use by\component\messageQueue\config\MQConfig;
use by\component\messageQueue\core\Binding;
use by\component\messageQueue\core\Producer;
use by\component\messageQueue\core\Queue;
use by\component\messageQueue\facade\RabbitAdmin;
use by\component\messageQueue\factory\ConnectionFactory;
use by\component\messageQueue\interfaces\ExchangeInterface;
use by\component\messageQueue\message\BaseMessage;
use by\infrastructure\helper\StringHelper;

class PrintProducer extends Producer
{

    private $name;
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
        if (empty($name)) {
            $name = 'prd_' . StringHelper::md5UniqueId();
        }
        $this->setName($name);
        // 总控初始化
        $this->admin = new RabbitAdmin(new ConnectionFactory($config->getHost(), $config->getUsername(), $config->getPassword(), $config->getVhost()));
    }

    function produce(BaseMessage $message)
    {
        $this->admin->publish($message, $this->binding);
    }

    public function ready(Queue $queue, ExchangeInterface $exchange = null, $routingKey = '')
    {
        // 队列-交换机-绑定关系定义
        $this->binding = BindBuilder::queue($queue)->bind($exchange)->with($routingKey)->build();
        $this->admin->declareExchange($exchange)->declareQueue($queue)->bind($this->binding);
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

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
     * @return Binding
     */
    public function getBinding()
    {
        return $this->binding;
    }

    /**
     * @param Binding $binding
     */
    public function setBinding($binding)
    {
        $this->binding = $binding;
    }

}