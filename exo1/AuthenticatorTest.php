<?php

require_once('Authenticator.php');
require_once('UserProvider.php');


use PHPUnit\Framework\TestCase;

class AuthenticatorTest extends TestCase
{
    private $authenticator;

    public function setUp()
    {
        $this->authenticator = new Authenticator(new UserProvider());
    }

    public function testAuth()
    {
        $usersToTest = $this->provideUsers();

        $user0 = $this->authenticator->auth($usersToTest[0]['username'], $usersToTest[0]['password']);
        $this->assertInstanceOf(User::class, $user0);
        
        $user1 = $this->authenticator->auth($usersToTest[1]['username'], $usersToTest[1]['password']);
        $this->assertNull($user1);

        $user2 = $this->authenticator->auth($usersToTest[2]['username'], $usersToTest[2]['password']);
        $this->assertInstanceOf(User::class, $user2);
    }

    private function provideUsers()
    {
        return [
            ['username' => 'MT7532', 'password' => 'lol123'],
            ['username' => 'XX1234', 'password' => 'hollyshit666'],
            ['username' => 'ZX7533', 'password' => 'mdr1111']
        ];
    }
}