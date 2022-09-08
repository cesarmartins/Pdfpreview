<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace CesarMartins\Pdfpreview\Controller\Adminhtml\Pdfpreview;

use Magento\Framework\Exception\LocalizedException;
use CesarMartins\Pdfpreview\Model\Pdfpreview\ImageUploader;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;
    private ImageUploader $imageUploader;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        ImageUploader $imageUploader
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('pdfpreview_id');

            $model = $this->_objectManager->create(\CesarMartins\Pdfpreview\Model\Pdfpreview::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Pdfpreview no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            if(!empty($data['image'])){
                $name = isset($data['image'][0]['name']) ? $data['image'][0]['name'] : null;

                if ($data['image'] && isset($data['image'][0]['name'])) {
                    $name = $data['image'][0]['name'];
                    $this->imageUploader->moveFileFromTmp($name);
                }elseif (isset($data['image'][0]['image'])){
                    $name = $data['image'][0]['image'];
                    //$this->imageUploader->moveFileFromTmp($name);
                }
                $model->setData('thumbnail', $name ? $name : $data['image'][0]['name']);
            }

            if(!empty($data['bar'])){
                $name = isset($data['bar'][0]['name']) ? $data['bar'][0]['name'] : null;

                if ($data['bar'] && isset($data['bar'][0]['name'])) {
                    $name = $data['bar'][0]['name'];
                    $this->imageUploader->moveFileFromTmp($name);
                }
                $model->setData('book', $name ? $name : $data['bar'][0]['name']);
            }

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Pdfpreview.'));
                $this->dataPersistor->clear('cesarMartins_pdfpreview_pdfpreview');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['pdfpreview_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Pdfpreview.'));
            }

            $this->dataPersistor->set('cesarMartins_pdfpreview_pdfpreview', $data);
            return $resultRedirect->setPath('*/*/edit', ['pdfpreview_id' => $this->getRequest()->getParam('pdfpreview_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}

