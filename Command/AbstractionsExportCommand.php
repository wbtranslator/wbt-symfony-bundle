<?php

namespace WBTranslator\WBTranslatorBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AbstractionsExportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('wbt:abstractions:export')
             ->setDescription('Send abstractions to WBTranslator.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Process ... ');
    
        $sdk = $this->getContainer()->get('wbt.sdk');
        
        $collection = $sdk->locator()->scan();
    
        if ($collection) {
            $result = $sdk->translations()->create($collection);
            $output->writeln('Send ' . !empty($result) ? count($result) : 0 . ' abstractions to WBTranslator');
        }
        
        $output->writeln('Finish!');
    }
}
