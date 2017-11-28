<?php

namespace AppBundle\Service;

interface ParserInterface
{
    public function parse(String $filePath) : array;
}

class CsvParser implements ParserInterface
{
    public function parse(String $filePath) : array
    {
        return [];
    }
}