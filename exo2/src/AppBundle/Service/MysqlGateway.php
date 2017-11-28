<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;


interface GatewayInterface
{
    public function insert(array $items) : int;
}

class MysqlGateway implements GatewayInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function insert(array $userslines) : int
    {
        foreach ($userslines as $line) {
            $user = $this->createUser($line);
            $this->em->persist($user);
        }

        return count($user);
    }

    private function createUser(array $line)
    {
        $user = new User();

        $user->setUsername($line[0])
            ->setNom($line[1])
            ->setPrenom($line[2])
            ->setRegion($line[3])
            ->setEmail($line[4]);

        return $user;
    }
}
