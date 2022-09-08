<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Block;

use CesarMartins\Pdfpreview\Model\ResourceModel\Pdfpreview\CollectionFactory as PdfpreviewCollectionFactory;
use Magento\Framework\UrlInterface;

class Pdfpreview extends \Magento\Framework\View\Element\Template
{

    protected $pdfpreviewCollection;
    protected $request;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        PdfpreviewCollectionFactory $pdfpreviewCollection,
        \Magento\Framework\App\Request\Http $request,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->pdfpreviewCollection = $pdfpreviewCollection;
        $this->request = $request;
    }

    public function getBook()
    {

        $bookId = $this->request->getParam('id');
        $post = $this->pdfpreviewCollection->create();
        return $post->addFieldToFilter('pdfpreview_id', $bookId)->getData()[0];

    }

    public function getCollectionBook()
    {

        $post = $this->pdfpreviewCollection->create();
        return $post->getData();

    }

    public function getBookPreview($bookPath)
    {

        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . 'pdfpreview/' . $bookPath;

    }

}

