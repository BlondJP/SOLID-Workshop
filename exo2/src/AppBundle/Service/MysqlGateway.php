<?php
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 19/01/2018
 * Time: 11:05
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class MysqlGateway implements GatewayInterface
{

    public $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Stocke les $items vers un WS ou une BDD
     *
     * @param array $items
     * @return int
     */
    public function insert(array $items) : int {
        $cpt = 0;
        foreach($items as $item) {
            $this->em->persist($item);
            $cpt++;
        }
        $this->em->flush();
        return $cpt;
    }
}