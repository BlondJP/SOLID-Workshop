<?php

namespace AppBundle\Command;

use AppBundle\Service\UserImportService;
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
        /* @var UserImportService $userImportService*/
        $userImportService = $this->getContainer()->get(UserImportService::class);
        $filePath = 'users.csv';

        $number = $userImportService->import($filePath);

        $output->write("$number users have been found in the file.\n");
    }
}