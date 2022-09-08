<?php
namespace CesarMartins\Pdfpreview\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Index implements HttpGetActionInterface
{

    protected $resultPageFactory;
    protected $pdfpreviewFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \CesarMartins\Pdfpreview\Model\PdfpreviewFactory $pdfpreviewFactory
    ) {

        $this->pdfpreviewFactory = $pdfpreviewFactory;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
