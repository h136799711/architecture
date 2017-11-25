<?php
/**
 * 注意：本内容仅限于博也公司内部传阅,禁止外泄以及用于其他的商业目的
 * @author    hebidu<346551990@qq.com>
 * @copyright 2017 www.itboye.com Boye Inc. All rights reserved.
 * @link      http://www.itboye.com/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * Revision History Version
 ********1.0.0********************
 * file created @ 2017-11-09 10:52
 *********************************
 ********1.0.1********************
 *
 *********************************
 */

namespace by\component\bookstore\v1\entity;


use by\infrastructure\base\BaseEntity;

/**
 * Class BookPageEntity
 * 书页对象-每页对象
 * @package by\component\bookstore\v1\entity
 */
class BookPageEntity extends BaseEntity
{
    private $bookId;
    private $pageNo;
    private $source;
    private $pageTitle;
    private $pageContent;

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * 当前页码
     * @return integer
     */
    public function getPageNo()
    {
        return $this->pageNo;
    }

    /**
     * 设置页码
     * @param integer $pageNo
     */
    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
    }

    /**
     * 获取书页内容来源
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * 设置书页内容来源
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * 获取当前书页标题
     * @return string
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * 设置当前书页标题
     * @param string $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * 获取当前书页内容
     * @return string
     */
    public function getPageContent()
    {
        return $this->pageContent;
    }

    /**
     * 设置书页内容
     * @param mixed $pageContent
     */
    public function setPageContent($pageContent)
    {
        $this->pageContent = $pageContent;
    }

}