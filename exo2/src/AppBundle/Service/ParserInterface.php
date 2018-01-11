<?php

namespace AppBundle\Service;


interface ParserInterface
{
    /**
     * Cette fonction retourne un array contenant les items dévoilés du $filePath
     *
     * @param String $filePath
     * @return array
     */
    public function parse(String $filePath) : array;
}