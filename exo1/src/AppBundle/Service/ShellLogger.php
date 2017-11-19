<?php

namespace AppBundle\Service;

use Psr\Log\LoggerInterface;


interface Logger
{
    public function log(String $line) : String;
}

class ShellLogger implements Logger
{
    public function __construct(LoggerInterface $logger)
    {
        
    }

    public function log(String $line) : String
    {
        /* Logging Logic HERE */

        return $line;
    }
}