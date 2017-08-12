<?php

namespace WBTranslator\WBTranslatorBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AbstractionsImportCommand extends Command
{
    protected function configure()
    {
        $this->setName('wbt:abstractions:import')
             ->setDescription('Get abstractions from WBTranslator and save them to lang directory.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Process ... ');
    
        $sdk = $this->getContainer()->get('wbt.sdk');
    
        $translations = $sdk->translations()->all();
    
        if ($translations) {
            $result = $sdk->locator()->put($translations);
            $output->writeln('Get ' . count($result) . ' abstractions from WBTranslator');
        }
    
        $output->writeln('Finish!');
    }
}
