<?php
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 11/01/2018
 * Time: 15:55
 */

namespace AppBundle\Command;

use AppBundle\Enum\UserImportEnum;
use AppBundle\Service\ImportInterface;
use AppBundle\Service\UserImportService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('solid:import-user')

            // the short description shown while running "php bin/console list"
            ->setDescription('Imports a new user.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to import a user...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get(UserImportService::class)->import('users.csv');
    }
}