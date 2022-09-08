<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PdfpreviewRepositoryInterface
{

    /**
     * Save Pdfpreview
     * @param \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface $pdfpreview
     * @return \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface $pdfpreview
    );

    /**
     * Retrieve Pdfpreview
     * @param string $pdfpreviewId
     * @return \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($pdfpreviewId);

    /**
     * Retrieve Pdfpreview matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \CesarMartins\Pdfpreview\Api\Data\PdfpreviewSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Pdfpreview
     * @param \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface $pdfpreview
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface $pdfpreview
    );

    /**
     * Delete Pdfpreview by ID
     * @param string $pdfpreviewId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($pdfpreviewId);
}

