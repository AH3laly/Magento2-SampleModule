<?php

namespace Mastering\SampleModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mastering\SampleModule\Model\ItemFactory;
use Magento\Framework\Console\Cli;

class AddItem extends Command {
    
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_DESCRIPTION = 'description';
    
    private $itemFactory;
    //private $logger;
    
    //Required only for Manual Event Dispatching
    //private $eventManager;
    
    public function __construct(
    
        ItemFactory $itemFactory
        
        //Required only for Manual Event Dispatching
        //Magento\Framework\Event\ManagerInterface $eventManager
        
        //\Psr\Log\LoggerInterface $logger
        
    ) {
        
        $this->itemFactory = $itemFactory;
        //$this->logger = $logger;
        //$this->eventManager = $eventManager;
        
        parent::__construct();
    }
    protected function configure() {
        
        $this->setName('mastering:item:add')->addArgument(
            self::INPUT_KEY_NAME, 
            InputArgument::REQUIRED,
            'Item Name'
        )->addArgument(
            self::INPUT_KEY_DESCRIPTION, 
            InputArgument::OPTIONAL, 
            'Item Description'
        );
        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output) {
        
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        $item->setIsObjctNew(true);
        $item->save();
        //$this->logger->debug('Item was created!');
        
        
        //Manual Event Dispatching
        //$this->eventManager->dispatch('mastering_command',['object'=>$item]);
        return Cli::RETURN_SUCCESS;
    }

}
