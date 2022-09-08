<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterface;
use CesarMartins\Pdfpreview\Api\Data\PdfpreviewInterfaceFactory;
use CesarMartins\Pdfpreview\Api\Data\PdfpreviewSearchResultsInterfaceFactory;
use CesarMartins\Pdfpreview\Api\PdfpreviewRepositoryInterface;
use CesarMartins\Pdfpreview\Model\ResourceModel\Pdfpreview as ResourcePdfpreview;
use CesarMartins\Pdfpreview\Model\ResourceModel\Pdfpreview\CollectionFactory as PdfpreviewCollectionFactory;

class PdfpreviewRepository implements PdfpreviewRepositoryInterface
{

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourcePdfpreview
     */
    protected $resource;

    /**
     * @var PdfpreviewCollectionFactory
     */
    protected $pdfpreviewCollectionFactory;

    /**
     * @var Pdfpreview
     */
    protected $searchResultsFactory;

    /**
     * @var PdfpreviewInterfaceFactory
     */
    protected $pdfpreviewFactory;


    /**
     * @param ResourcePdfpreview $resource
     * @param PdfpreviewInterfaceFactory $pdfpreviewFactory
     * @param PdfpreviewCollectionFactory $pdfpreviewCollectionFactory
     * @param PdfpreviewSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourcePdfpreview $resource,
        PdfpreviewInterfaceFactory $pdfpreviewFactory,
        PdfpreviewCollectionFactory $pdfpreviewCollectionFactory,
        PdfpreviewSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->pdfpreviewFactory = $pdfpreviewFactory;
        $this->pdfpreviewCollectionFactory = $pdfpreviewCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(PdfpreviewInterface $pdfpreview)
    {
        try {
            $this->resource->save($pdfpreview);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the pdfpreview: %1',
                $exception->getMessage()
            ));
        }
        return $pdfpreview;
    }

    /**
     * @inheritDoc
     */
    public function get($pdfpreviewId)
    {
        $pdfpreview = $this->pdfpreviewFactory->create();
        $this->resource->load($pdfpreview, $pdfpreviewId);
        if (!$pdfpreview->getId()) {
            throw new NoSuchEntityException(__('Pdfpreview with id "%1" does not exist.', $pdfpreviewId));
        }
        return $pdfpreview;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->pdfpreviewCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(PdfpreviewInterface $pdfpreview)
    {
        try {
            $pdfpreviewModel = $this->pdfpreviewFactory->create();
            $this->resource->load($pdfpreviewModel, $pdfpreview->getPdfpreviewId());
            $this->resource->delete($pdfpreviewModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Pdfpreview: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($pdfpreviewId)
    {
        return $this->delete($this->get($pdfpreviewId));
    }
}

