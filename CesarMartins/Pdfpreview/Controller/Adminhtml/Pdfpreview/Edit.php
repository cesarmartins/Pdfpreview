<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Controller\Adminhtml\Pdfpreview;

class Edit extends \CesarMartins\Pdfpreview\Controller\Adminhtml\Pdfpreview
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('pdfpreview_id');
        $model = $this->_objectManager->create(\CesarMartins\Pdfpreview\Model\Pdfpreview::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Pdfpreview no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('cesarMartins_pdfpreview_pdfpreview', $model);

        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Pdfpreview') : __('New Pdfpreview'),
            $id ? __('Edit Pdfpreview') : __('New Pdfpreview')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Pdfpreviews'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Pdfpreview %1', $model->getId()) : __('New Pdfpreview'));
        return $resultPage;
    }
}

