<?php

class User
{
    public $username;
    public $password;

    public function __construct(String $username, String $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
}