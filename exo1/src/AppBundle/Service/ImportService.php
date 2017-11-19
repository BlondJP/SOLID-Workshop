<?php

namespace AppBundle\Service;
use AppBundle\Service\CsvParser;
use AppBundle\Service\ParserInterface;

interface ImportInterface
{
    public function import() : array;
}

class ImportService implements ImportInterface
{
    private $parser;
    private $logger;
    private $gateway;

    public function __construct(ParserInterface $parser)
    {

    }

    public function import() : array
    {
        return [];
    }
}