<?php

namespace Tests\AppBundle\Service;

use AppBundle\Enum\UserImportEnum;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class UserImportEnumTest
 * @package Tests\AppBundle\Service
 * @group UserImportEnumTest
 */
class UserImportEnumTest extends WebTestCase
{
    public function testGetColumnsTitles()
    {
        $this->assertEquals(UserImportEnum::USERNAME, 0);
        $this->assertEquals(UserImportEnum::NOM, 1);
        $this->assertEquals(UserImportEnum::PRENOM, 2);
        $this->assertEquals(UserImportEnum::REGION, 3);
        $this->assertEquals(UserImportEnum::EMAIL, 4);
    }
}