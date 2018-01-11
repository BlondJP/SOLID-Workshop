<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Enum\UserImportEnum;
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
            if ($user instanceof User) {
                $this->em->persist($user);
            }
        }
        $this->em->flush();

        return count($userslines);
    }

    private function createUser(array $line)
    {
        $user = new User();

        $user->setUsername($line[UserImportEnum::USERNAME])
            ->setNom($line[UserImportEnum::NOM])
            ->setPrenom($line[UserImportEnum::PRENOM])
            ->setRegion($line[UserImportEnum::REGION])
            ->setEmail($line[UserImportEnum::EMAIL]);

        return $user;
    }
}
