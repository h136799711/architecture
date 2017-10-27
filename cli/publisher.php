<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-26 17:41
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace byCli;

use by\component\messageQueue\builder\BindBuilder;
use by\component\messageQueue\core\exchanges\DirectExchange;
use by\component\messageQueue\core\Queue;
use by\component\messageQueue\facade\RabbitAdmin;
use by\component\messageQueue\factory\ConnectionFactory;
use by\component\messageQueue\message\JsonMessage;

require_once '../vendor/autoload.php';

$host = '47.88.216.242';
$username = 'hebidu';
$password = '364945361';
$vhost = 'qqav.club';

$exchangeName = 'direct_exchange';
$queueName = 'direct';
$routingKey = 'qqav.club.test.topic.delete';
// 定义路由交换机
$exchange = new DirectExchange($exchangeName);
// 定义队列
$queue = new Queue($queueName);
$queue->setPassive(false);
// 队列-交换机-绑定关系定义
$binding = BindBuilder::queue($queue)->bind($exchange)->with($routingKey)->build();

// 总控初始化
$admin = new RabbitAdmin(new ConnectionFactory($host, $username, $password, $vhost));
// 创建交换机-队列-绑定关系
$admin->declareExchange($exchange)->declareQueue($queue)->bind($binding);

var_dump($admin->getLastDeclareQueueInfo());
var_dump($admin->getLastDeclareExchangeInfo());

// 创建消息
$message = new JsonMessage();

$cnt = 2;
while ($cnt--) {
    $body = json_encode(['username' => 'hebidu', 'nickname' => '何必都']);
    $total = strlen($body);
    $message->setBodySize($total);
    $message->setBody($body);
    $admin->publish($message, $binding);
}

