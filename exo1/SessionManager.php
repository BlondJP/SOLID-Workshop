<?php

require_once('Authenticator.php');
require_once('Authorizator.php');
require_once('User.php');

class SessionManager
{
    private $authenticator;
    private $authorizator;

    public function __construct(Authenticator $authenticator, Authorizator $authorizator)
    {
        $this->authenticator = $authenticator;
        $this->authorizator = $authorizator;
    }

    public function login(String $username, String $password)
    {
        $user = $this->authenticator->auth($username, $password);
        if ($user instanceof User) {
            $answer = $this->authorizator->canAccess($user);
            if ($answer === true) {
                return true;
            }            
        }

        return false;
    }
}