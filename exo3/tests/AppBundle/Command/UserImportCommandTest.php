<?php


namespace Tests\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Command\UserImportCommand;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;



/**
 * @group UserImportCommandTest
 */
class UserImportCommandTest extends WebTestCase
{
    private $command;

    public function setUp()
    {
        $this->command = new UserImportCommand();
    }

    public function testInstanciation1()
    {
        $this->assertInstanceOf(Command::class, $this->command);
    }

    public function testInstanciation2()
    {
        $this->assertInstanceOf(ContainerAwareCommand::class, $this->command);
    }
}