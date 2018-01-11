<?php
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 11/01/2018
 * Time: 15:06
 */

namespace AppBundle\Service;


use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class CsvParser implements ParserInterface
{

    public function parse(String $filePath): array
    {
        $path = sprintf('/Users/jean-philippeblond/Projects/solid/exo2/%s', $filePath);

        if (!file_exists($path)) {
            throw new FileNotFoundException();
        }
        $csv_content = [];
        $handle = fopen($path,'r');
        while ($data = fgetcsv($handle, 0, ';')) {
            $csv_content [] = $data;
        }
        array_shift($csv_content);

        return $csv_content;
    }
}