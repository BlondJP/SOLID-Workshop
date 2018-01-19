<?php
namespace AppBundle\Command;
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 19/01/2018
 * Time: 11:26
 */
use AppBundle\Service\UserImportService;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareInterface;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserImportCommand extends ContainerAwareCommand
{
    public $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    protected function configure()
    {
        $this
        // the name of the command (the part after "bin/console")
        ->setName('app:import-users')
        ->addArgument('filePath', InputArgument::REQUIRED, 'The filePath of the CSV.')

            // the short description shown while running "php bin/console list"
        ->setDescription('Imports new users.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to imports users...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userImportService = $this->container->get(UserImportService::class);

        $result = $userImportService->import($input->getArgument('filePath'));

        $output->writeln($result);
    }

}