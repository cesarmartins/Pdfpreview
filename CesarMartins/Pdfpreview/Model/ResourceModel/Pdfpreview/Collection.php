<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Model\ResourceModel\Pdfpreview;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'pdfpreview_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \CesarMartins\Pdfpreview\Model\Pdfpreview::class,
            \CesarMartins\Pdfpreview\Model\ResourceModel\Pdfpreview::class
        );
    }
}

