<?php

require_once('Authenticator.php');
require_once('Authorizator.php');
require_once('SessionManager.php');

use PHPUnit\Framework\TestCase;

class SessionManagerTest extends TestCase
{
    private $sessionManager;

    public function setUp()
    {
        $this->sessionManager = new SessionManager(new Authenticator(new UserProvider()), new Authorizator());
    }

    public function testLogin()
    {
        $usersToTest = $this->provideUsers();

        $answer1 = $this->sessionManager->login($usersToTest[0]['username'], $usersToTest[0]['password']);
        $this->assertTrue($answer1);
        
        $answer2 = $this->sessionManager->login($usersToTest[1]['username'], $usersToTest[1]['password']);
        $this->assertFalse($answer2);
    }

    private function provideUsers()
    {
        return [
            ['username' => 'MT7532', 'password' => 'lol123'],
            ['username' => 'XX1234', 'password' => 'hollyshit666']
        ];
    }
}