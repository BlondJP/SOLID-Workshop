<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('solid:import-user')
            ->setDescription('Import Users From a File')
            ->setHelp('This command allows you to Import Users From a File')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        /*$output->writeln([
            'User Creator',
            '============',
            '',
        ]);
    
        // outputs a message followed by a "\n"
        $output->writeln('Whoa!');*/
    
        // outputs a message without adding a "\n" at the end of the line
        $output->write("I am SOLID \n");
        $output->write("And I'll import some user\n");
    }
}