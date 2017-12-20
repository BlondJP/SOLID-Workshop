<?php

namespace AppBundle\Service;

use AppBundle\Enum\UserImportEnum;
use Symfony\Component\Config\Exception\FileLoaderLoadException;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Tests\AppBundle\Service\UserImportEnumTest;

interface ParserInterface
{
    public function parse(String $filePath) : array;
}

class CsvParser implements ParserInterface
{
    const HEADERS_LINE = 0;

    public function parse(String $filePath) : array
    {
        $index = 0;
        $handle = $this->handleFileErrors($filePath);

        $lines = [];
        while ($csvLine = fgets($handle)) {
            $line = explode(';', trim($csvLine));
            if ($index === self::HEADERS_LINE) {
                $this->handleHeadersError($line);
            } else {
                $lines[] = $line;
            }
            $index++;
        }

        return $lines;
    }

    private function handleHeadersError(array $headersLine) : void
    {
        $headers = UserImportEnum::getOrderedHeaders();
        foreach ($headers as $key => $header) {
            if ($header !== strtolower($headersLine[$key])) {
                throw new FileException('Mauvais nom de colonne : '.$headersLine[$key]);

            }
        }
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