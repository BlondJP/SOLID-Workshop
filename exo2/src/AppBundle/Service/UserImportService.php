<?php
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 11/01/2018
 * Time: 15:40
 */

namespace AppBundle\Service;


class UserImportService implements ImportInterface
{

    public $parser;
    public $gw;

    public function __construct(ParserInterface $parser, GatewayInterface $gw)
    {
        $this->gw = $gw;
        $this->parser = $parser;
    }

    public function import(String $filePath): int
    {
        $lines = $this->parser->parse($filePath);

        return $this->gw->insert($lines);
    }
}