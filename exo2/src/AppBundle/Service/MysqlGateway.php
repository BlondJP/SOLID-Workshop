<?php
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 11/01/2018
 * Time: 15:29
 */

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Enum\UserImportEnum;
use Doctrine\ORM\EntityManager;

class MysqlGateway implements GatewayInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Stocke les $items vers un WS ou une BDD
     *
     * @param array $items
     * @return int
     */
    public function insert(array $items): int
    {
        $counter = 0;

        array_walk($items, function ($line) use (&$counter) {
            $user = new User();
            $user->setPrenom($line[UserImportEnum::PRENOM]);
            $user->setNom($line[UserImportEnum::NOM]);
            $user->setEmail($line[UserImportEnum::EMAIL]);
            $user->setRegion($line[UserImportEnum::REGION]);
            $user->setUsername($line[UserImportEnum::USERNAME]);

            $this->entityManager->persist($user);
            $counter++;
        });

        $this->entityManager->flush();

        return $counter;
    }
}