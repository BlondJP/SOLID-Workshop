<?php

namespace Tests\AppBundle\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Service\CsvParser;
use AppBundle\Service\ParserInterface;



class SolidTest extends WebTestCase
{
    public function testParser()
    {
        $parser = new CsvParser();
        $this->assertInstanceOf(ParserInterface::class, $parser);

        $data = $parser->parse();
        $this->assertInternalType('array',$data);
    }

    public function testLogger()
    {
        $parser = new CsvParser();
        $this->assertInstanceOf(ParserInterface::class, $parser);

        $data = $parser->parse();
        $this->assertInternalType('array',$data);
    }
}
