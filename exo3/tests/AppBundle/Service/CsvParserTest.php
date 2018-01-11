<?php

namespace Tests\AppBundle\Service;

use AppBundle\Service\CsvParser;
use AppBundle\Service\ParserInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class CsvParserTest
 * @package Tests\AppBundle\Service
 * @group CsvParserTest
 */
class CsvParserTest extends WebTestCase
{
    /* @var CsvParser $csvParser */
    private $csvParser;

    public function setUp()
    {
        $this->csvParser = new CsvParser();
    }

    public function testCsvParserInterfaceTyping()
    {
        $this->assertInstanceOf(ParserInterface::class, $this->csvParser);
    }

    /**
     * @expectedException Symfony\Component\Filesystem\Exception\FileNotFoundException
     */
    public function testHandleFileErrorsThrowParse()
    {
        $filePath = 'fakePath';
        $this->csvParser->parse($filePath);
    }

    public function testParse()
    {
        $filePath = 'users.csv';
        $users = $this->csvParser->parse($filePath);
        $this->assertEquals($users, $this->userProvider());
    }

    public function userProvider()
    {
        return [
            [0 => "MT5476", 1 => "BLOND", 2 => "JP-Sama", 3 => "IDF", 4 => "jpblond@maltem.com",],
            [0 => "ZZ999", 1 => "NORRIS", 2 => "Chuck", 3 => "Texas", 4 => "chuck@norris.com",],
            [0 => "FB2007", 1 => "ZUCKERBERG", 2 => "Mark", 3 => "Silicon Valley", 4 => "mark@facebook.com"]
        ];
    }
}