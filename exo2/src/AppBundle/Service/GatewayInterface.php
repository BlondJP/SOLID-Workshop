<?php

namespace AppBundle\Service;

interface GatewayInterface
{
    /**
     * Stocke les $items vers un WS ou une BDD
     *
     * @param array $items
     * @return int
     */
    public function insert(array $items) : int;
}