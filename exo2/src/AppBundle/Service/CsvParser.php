<?php

namespace AppBundle\Service;

use Symfony\Component\Config\Exception\FileLoaderLoadException;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

interface ParserInterface
{
    public function parse(String $filePath) : array;
}

class CsvParser implements ParserInterface
{
    public function parse(String $filePath) : array
    {
        $handle = $this->handleFileErrors($filePath);

        $lines = [];
        while ($csvLine = fgets($handle)) {
            $lines[] = explode(';', $csvLine);
        }

        return $lines;
    }

    private function handleFileErrors(String $filePath)
    {
        if (file_exists($filePath) === false) {
            throw new FileNotFoundException('Erreur : Le fichier '.$filePath.' n\'existe pas.');
        }
        if (($handle = fopen($filePath, "r")) === false) {
            throw new FileLoaderLoadException('Erreur : Le fichier est protégé en lecture.');
        }

        return $handle;
    }
}