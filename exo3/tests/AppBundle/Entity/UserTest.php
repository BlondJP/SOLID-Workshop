<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Core\User\UserInterface;

class UserTest extends WebTestCase
{
    public function testInstanciation()
    {
        $user = new User();
        $this->assertInstanceOf(UserInterface::class, $user);
    }
}