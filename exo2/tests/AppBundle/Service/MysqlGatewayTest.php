<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\GatewayInterface;
use AppBundle\Service\MysqlGateway;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class MysqlGatewayTest
 * @package Tests\AppBundle\Service
 * @group MysqlGatewayTest
 */
class MysqlGatewayTest extends WebTestCase
{
    /* @var EntityManager $emMock */
    private $emMock;

    /* @var MysqlGateway $mysqlGateway */
    private $mysqlGateway;

    public function setUp()
    {
        // EM Mock
        $this->emMock = $this->createMock(EntityManager::class);
        $this->mysqlGateway = new MysqlGateway($this->emMock);
    }

    public function testMysqlGatewayInterfaceTyping()
    {
        $this->assertInstanceOf(GatewayInterface::class, $this->mysqlGateway);
    }


    public function testInsertOK()
    {
        $users = $this->usersProvider()[0];

        $this->emMock->expects($this->once())->method('flush')->willReturn(null);
        $this->emMock->expects($this->exactly(count($users)))->method('persist')->willReturn(null);

        $numberOfInsertedUser = $this->mysqlGateway->insert($users);
        $this->assertEquals($numberOfInsertedUser, count($users));
    }

    public function testInsertEmpty()
    {
        $users = $this->usersProvider()[1];

        $this->emMock->expects($this->once())->method('flush')->willReturn(null);
        $this->emMock->expects($this->exactly(count($users)))->method('persist')->willReturn(null);

        $numberOfInsertedUser = $this->mysqlGateway->insert($users);
        $this->assertEquals($numberOfInsertedUser, count($users));
    }

    private function usersProvider()
    {
        return [

            [
                [
                    0 => "MT5476",
                    1 => "BLOND",
                    2 => "JP-Sama",
                    3 => "IDF",
                    4 => "jpblond@maltem.com"
                ],
                 [
                    0 => "NT5254",
                    1 => "ATANON",
                    2 => "Boris",
                    3 => "IDF",
                    4 => "batanon@maltem.com"
                ]
            ],

            []

        ];
    }
}