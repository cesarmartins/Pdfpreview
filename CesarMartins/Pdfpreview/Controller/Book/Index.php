<?php
namespace CesarMartins\Pdfpreview\Controller\Book;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Index implements HttpGetActionInterface
{
    protected $request;
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
        \CesarMartins\Pdfpreview\Model\PdfpreviewFactory $pdfpreviewFactory,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->request = $request;
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

        $id = $this->request->getParam('id');

        /*$post = $this->pdfpreviewFactory->create();
        $collection = $post->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }*/
        return $this->resultPageFactory->create();
    }
}
