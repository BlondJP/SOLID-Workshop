<?php

namespace AppBundle\Service;

interface ImportInterface
{
    /**
     * Importe les items trouvés dans le fichier et retourne le nombre d'items inseres
     *
     * @param String $filePath
     * @return int
     */
    public function import(String $filePath) : int;
}