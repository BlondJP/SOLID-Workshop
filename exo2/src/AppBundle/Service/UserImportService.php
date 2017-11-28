<?php

namespace AppBundle\Service;

use AppBundle\Service\CsvParser;
use AppBundle\Service\ParserInterface;
use AppBundle\Service\GatewayInterface;

use Symfony\Component\Console\Output\OutputInterface;

interface ImportInterface
{
    public function import(String $filePath) : int;
}

class UserImportService implements ImportInterface
{
    private $parser;
    private $outputter;
    private $gateway;

    public function __construct(ParserInterface $parser, OutputInterface $outputter, GatewayInterface $gateway)
    {
        $this->parser = $parser;
        $this->outputter = $outputter;
        $this->gateway = $gateway;
    }

    /**
     * Cette fonction va faire l'import des users contenu dans le fichier $filePath
     * Elle retourne le nombre d'utilisateurs qui ont été importés
     * 
     * @param String $filePath
     * @return int
     */
    public function import(String $filePath) : int
    {
        $users = $this->parser->parse($filePath);
        $importedUserNumber = $this->gateway->insert($users);

        return $importedUserNumber;
    }
}