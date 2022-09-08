<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Model;

use Magento\Framework\Model\AbstractModel;
use CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface;

class Pdfpreview extends AbstractModel implements PdfpreviewInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\CesarMartins\Pdfpreview\Model\ResourceModel\Pdfpreview::class);
    }

    /**
     * @inheritDoc
     */
    public function getPdfpreviewId()
    {
        return $this->_get(self::PDFPREVIEW_ID);
    }

    /**
     * @inheritDoc
     */
    public function setPdfpreviewId($pdfpreviewId)
    {
        return $this->setData(self::PDFPREVIEW_ID, $pdfpreviewId);
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritDoc
     */
    public function getAuthor()
    {
        return $this->_get(self::AUTHOR);
    }

    /**
     * @inheritDoc
     */
    public function setAuthor($author)
    {
        return $this->setData(self::AUTHOR, $author);
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function getThumbnail()
    {
        return $this->_get(self::THUMBNAIL);
    }

    /**
     * @inheritDoc
     */
    public function setThumbnail($thumbnail)
    {
        return $this->setData(self::THUMBNAIL, $thumbnail);
    }

    /**
     * @inheritDoc
     */
    public function getBook()
    {
        return $this->_get(self::BOOK);
    }

    /**
     * @inheritDoc
     */
    public function setBook($book)
    {
        return $this->setData(self::BOOK, $book);
    }

    /**
     * @inheritDoc
     */
    public function getCategory()
    {
        return $this->_get(self::CATEGORY);
    }

    /**
     * @inheritDoc
     */
    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }

    /**
     * @inheritDoc
     */
    public function getEditora()
    {
        return $this->_get(self::EDITORA);
    }

    /**
     * @inheritDoc
     */
    public function setEditora($editora)
    {
        return $this->setData(self::EDITORA, $editora);
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedTime()
    {
        return $this->_get(self::CREATED_TIME);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedTime($createdTime)
    {
        return $this->setData(self::CREATED_TIME, $createdTime);
    }

    /**
     * @inheritDoc
     */
    public function getUpdateTime()
    {
        return $this->_get(self::UPDATE_TIME);
    }

    /**
     * @inheritDoc
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
}

