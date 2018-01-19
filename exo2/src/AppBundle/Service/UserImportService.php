<?php
/**
 * Created by PhpStorm.
 * User: jean-philippeblond
 * Date: 19/01/2018
 * Time: 11:18
 */

namespace AppBundle\Service;


class UserImportService implements ImportInterface
{
    public $parser;
    public $gateway;

    public function __construct(ParserInterface $parser, GatewayInterface $gateway)
    {
        $this->parser = $parser;
        $this->gateway = $gateway;
    }

    /**
     * Importe les items trouvés dans le fichier
     *
     * @param String $filePath
     * @return int
     */
    public function import(String $filePath) : int
    {
        $users = $this->parser->parse($filePath);
        return $this->gateway->insert($users);
    }
}