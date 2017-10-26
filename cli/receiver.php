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

use by\component\messageQueue\impl\RabbitAdmin;

require_once '../vendor/autoload.php';

$host = '47.88.216.242';
$username = 'hebidu';
$password = '364945361';
$vhost = 'qqav.club';
$topic = 'topic_exchange';
$queue = 'topic_queue';
$routingKey = 'qqav.club.test.topic.create';

$admin = new RabbitAdmin(new \by\component\messageQueue\factory\ConnectionFactory($host, $username, $password, $vhost));

$exchange = $admin->declareTopicExchange($topic);
$queue = $admin->declareQueue($queue);
$binding = new \by\component\messageQueue\core\Binding($queue, $exchange, $routingKey);
$admin->bind($binding);

$callback = function ($msg) {
    echo ' [x] ', $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
};

$admin->subscribe($binding, $callback);


