<?php

namespace Tests\AppBundle\Service;

// to extend
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

// To inject
use AppBundle\Service\CsvParser;
use AppBundle\Service\MysqlGateway;

// to instanciate
use AppBundle\Service\UserImportService;


class UserImportServiceTest extends WebTestCase
{
    /* @var UserImportService $userImportService*/
    private $userImportService;

    public function setUp()
    {
        $fakeEntityManager = $this->createMock(EntityManager::class);
        $this->userImportService = new UserImportService(new CsvParser(), new MysqlGateway($fakeEntityManager));
    }

    public function testInstanciation()
    {
        $this->assertInstanceOf(UserImportService::class, $this->userImportService);
    }

    public function testImport()
    {
        $usersImportedNumber = $this->userImportService->import('users.csv');
        $expectedUsersImportedNumber = 4;
        $this->assertEquals($usersImportedNumber, $expectedUsersImportedNumber);
    }
}
