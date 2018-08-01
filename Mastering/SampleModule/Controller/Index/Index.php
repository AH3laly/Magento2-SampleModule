<?php

namespace Mastering\SampleModule\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action {
    
    public function execute() {
        
        /** @var \Magento\Framework\Controller\Result\Raw $result */
        /*
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents("Hello World");
        return $result;
        */
        
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
    }
}