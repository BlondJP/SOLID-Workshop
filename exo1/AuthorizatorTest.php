<?php

require_once('Authenticator.php');
require_once('Authorizator.php');
require_once('SessionManager.php');
require_once('User.php');

use PHPUnit\Framework\TestCase;

class AuthorizatorTest extends TestCase
{
    private $authorizator;

    public function setUp()
    {
        $this->authorizator = new Authorizator();
    }

    public function testAuth()
    {
        $user = new User('lol', 'lol');
        $answer = $this->authorizator->canAccess($user);
        
        $this->assertTrue($answer);
    }
}