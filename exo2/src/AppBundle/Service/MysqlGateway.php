<?php

namespace AppBundle\Service;

use Psr\Log\LoggerInterface;


interface GatewayInterface
{
    public function insert(array $items) : int;
}

class MysqlGateway implements GatewayInterface
{
    public function insert(array $users) : int
    {
        return count($users);
    }
}