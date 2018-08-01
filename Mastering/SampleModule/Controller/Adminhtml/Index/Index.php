<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action {
    
    public function execute() {
        
        /** @var \Magento\Framework\Controller\Result\Raw $result */
        //Display RAW Content.
        //$result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        //$result->setContents("Hello Admins!!");
        
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
