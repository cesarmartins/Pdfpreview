<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Api\Data;

interface PdfpreviewInterface
{

    const TITLE = 'title';
    const CATEGORY = 'category';
    const STATUS = 'status';
    const EDITORA = 'editora';
    const AUTHOR = 'author';
    const CREATED_TIME = 'created_time';
    const BOOK = 'book';
    const UPDATE_TIME = 'update_time';
    const PDFPREVIEW_ID = 'pdfpreview_id';
    const THUMBNAIL = 'thumbnail';
    const DESCRIPTION = 'description';

    /**
     * Get pdfpreview_id
     * @return string|null
     */
    public function getPdfpreviewId();

    /**
     * Set pdfpreview_id
     * @param string $pdfpreviewId
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setPdfpreviewId($pdfpreviewId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setTitle($title);

    /**
     * Get author
     * @return string|null
     */
    public function getAuthor();

    /**
     * Set author
     * @param string $author
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setAuthor($author);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setDescription($description);

    /**
     * Get thumbnail
     * @return string|null
     */
    public function getThumbnail();

    /**
     * Set thumbnail
     * @param string $thumbnail
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setThumbnail($thumbnail);

    /**
     * Get book
     * @return string|null
     */
    public function getBook();

    /**
     * Set book
     * @param string $book
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setBook($book);

    /**
     * Get category
     * @return string|null
     */
    public function getCategory();

    /**
     * Set category
     * @param string $category
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setCategory($category);

    /**
     * Get editora
     * @return string|null
     */
    public function getEditora();

    /**
     * Set editora
     * @param string $editora
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setEditora($editora);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setStatus($status);

    /**
     * Get created_time
     * @return string|null
     */
    public function getCreatedTime();

    /**
     * Set created_time
     * @param string $createdTime
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setCreatedTime($createdTime);

    /**
     * Get update_time
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Set update_time
     * @param string $updateTime
     * @return \CesarMartins\Pdfpreview\Pdfpreview\Api\Data\PdfpreviewInterface
     */
    public function setUpdateTime($updateTime);
}

