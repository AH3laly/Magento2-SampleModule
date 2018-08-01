<?php

namespace Mastering\SampleModule\Plugin;

use Mastering\SampleModule\Console\Command\AddItem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Logger
{
    /**
     * @var OutputInterface
     */
    private $output;

    public function beforeRun(
        AddItem $command, //The object
        InputInterface $input, //The first paramenter of the object
        OutputInterface $output //the second parameter of the object
    ) {
        $output->writeln('beforeExecute');
    }

    public function aroundRun(
        AddItem $command, //The object
        \Closure $proceed, //Can be used to invoke the original class
        InputInterface $input, //The first paramenter of the object
        OutputInterface $output //the second parameter of the object
    ) {
        $output->writeln('aroundExecute before call');
        $proceed->call($command, $input, $output);
        $output->writeln('aroundExecute after call');
        $this->output = $output;
    }

    public function afterRun(AddItem $command)
    {
        $this->output->writeln('afterExecute');
    }
}