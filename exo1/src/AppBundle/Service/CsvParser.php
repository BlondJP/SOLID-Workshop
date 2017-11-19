<?php

namespace AppBundle\Service;

interface ParserInterface
{
    public function parse() : array;
}

class CsvParser implements ParserInterface
{
    public function parse() : array
    {
        return [];
    }
}