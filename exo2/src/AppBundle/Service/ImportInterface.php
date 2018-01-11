<?php

namespace AppBundle\Service;

interface ImportInterface
{
    /**
     * Importe les items trouvés dans le fichier
     *
     * @param String $filePath
     * @return int
     */
    public function import(String $filePath) : int;
}