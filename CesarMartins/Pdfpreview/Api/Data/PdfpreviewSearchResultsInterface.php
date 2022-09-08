<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Api\Data;

interface PdfpreviewSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Pdfpreview list.
     * @return \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

