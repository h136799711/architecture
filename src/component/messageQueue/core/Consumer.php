<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-10-27 14:18
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\messageQueue\core;


use by\infrastructure\helper\StringHelper;

/**
 * Class Consumer
 * 消费着抽象类
 * @package by\component\messageQueue\core
 */
abstract class Consumer
{

    private $consumerName;
    private $queueName;

    /**
     * Consumer constructor.
     * @param string $queueName 消费者关联队列
     * @param string $consumerName 消费者标识名称，可不传，默认生成随机字符串 cms_ 前缀
     */
    function __construct($queueName = '', $consumerName = '')
    {
        if (empty($consumerName)) {
            $consumerName = 'csm_' . StringHelper::md5UniqueId();
        }
        $this->setQueueName($queueName);
        $this->setConsumerName($consumerName);
    }

    /**
     * @return mixed
     */
    public function getConsumerName()
    {
        return $this->consumerName;
    }

    /**
     * @param mixed $consumerName
     */
    public function setConsumerName($consumerName)
    {
        $this->consumerName = $consumerName;
    }

    /**
     * @return mixed
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * @param mixed $queueName
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
    }


}