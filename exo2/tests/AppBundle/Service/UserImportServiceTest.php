<?php

namespace Tests\AppBundle\Service;

// to extend
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

// To inject
use AppBundle\Service\CsvParser;
use AppBundle\Service\MysqlGateway;
use Symfony\Component\Console\Output\BufferedOutput;

// to instanciate
use AppBundle\Service\UserImportService;


class UserImportServiceTest extends WebTestCase
{
    /* @var UserImportService $userImportService*/
    private $userImportService;

    public function setUp()
    {
        $this->userImportService = new UserImportService(new CsvParser(), new BufferedOutput(), new MysqlGateway());
    }

    public function testInstanciation()
    {
        $this->assertInstanceOf(UserImportService::class, $this->userImportService);
    }

    public function testImport()
    {
        $usersImportedNumber = $this->userImportService->import('');
        $this->assertEquals($usersImportedNumber, 0);
    }
}
