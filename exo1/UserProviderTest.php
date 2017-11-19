<?php

require_once('UserProvider.php');

use PHPUnit\Framework\TestCase;

class UserProviderTest extends TestCase
{
    private $userProvider;

    public function setUp()
    {
        $this->userProvider = new UserProvider();
    }

    public function testClasseExisting()
    {
        $this->assertInstanceOf(UserProvider::class, $this->userProvider);
    }

    public function testProvide()
    {
        $usersToTest = $this->provideUsers();

        $user0 = $this->userProvider->provide($usersToTest[0]['username'], $usersToTest[0]['password']);
        $this->assertInstanceOf(User::class, $user0);

        $user1 = $this->userProvider->provide($usersToTest[1]['username'], $usersToTest[1]['password']);
        $this->assertNull($user1);

        $user2 = $this->userProvider->provide($usersToTest[2]['username'], $usersToTest[2]['password']);
        $this->assertInstanceOf(User::class, $user2);

        $user3 = $this->userProvider->provide($usersToTest[3]['username'], $usersToTest[3]['password']);
        $this->assertInstanceOf(User::class, $user3);

        $user4 = $this->userProvider->provide($usersToTest[4]['username'], $usersToTest[4]['password']);
        $this->assertInstanceOf(User::class, $user4);

        $user5 = $this->userProvider->provide($usersToTest[5]['username'], $usersToTest[5]['password']);
        $this->assertInstanceOf(User::class, $user5);
        
    }

    private function provideUsers()
    {
        return [
            ['username' => 'MT7532', 'password' => 'lol123'],
            ['username' => 'XX1234', 'password' => 'hollyshit666'],
            ['username' => 'ZX7533', 'password' => 'mdr1111'],
            ['username' => 'SW7531', 'password' => 'ddsf432'],
            ['username' => 'GV7539', 'password' => 'azerty123++'],
            ['username' => 'KL7538', 'password' => 'qwerty456++'],
        ];
    }
}