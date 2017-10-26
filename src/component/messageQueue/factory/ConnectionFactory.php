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

use by\component\messageQueue\core\Channel;
use by\component\messageQueue\core\Connection;
use by\component\messageQueue\interfaces\ExchangeInterface;

class ConnectionFactory
{

    // member function

    public function declareExchange(ExchangeInterface $exchange, Channel $channel = null)
    {

//        $arguments = $exchange->getArguments();

//        $passive = ArrayHelper::get
//        $durable = false,
//        $auto_delete = true,
//        $internal = false,
//        $nowait = false,
//        $arguments = null,
//        $ticket = null
//        $channel->getChannel()->exchange_declare($exchange->getName(), $exchange->getExchangeType());
    }

    /**
     *
     * @return Channel
     */
    public function getChannel()
    {
        if ($this->channel) {
            $this->channel = new Channel($this);
        }

        return $this->channel;
    }

    /**
     *
     * @return Channel
     */
    public function getNewChannel()
    {
        $this->channel = new Channel($this);
        return $this->channel;
    }

    public function getAMQPConnection()
    {
        return $this->connection->getConnection();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setUsername($username)
    {
        $this->connection->setUsername($username);
    }

    // construct
    public function __construct($host, $username = '', $password = '', $vhost = '/', $port = '5672')
    {
        $this->connection = new Connection($host, $username, $password, $vhost, $port);
    }

    // override function __toString()

    // member variables
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

    // getter setter

}