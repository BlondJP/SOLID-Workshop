<?php

require_once('User.php');

class Authorizator
{
    public function canAccess(User $user) : bool
    {
        return true;
    }
}