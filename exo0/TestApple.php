<?php

use PHPUnit\Framework\TestCase;
require_once('Apple.php');

class TestApple extends TestCase
{
    public function testAttributs()
    {
        $apple = new Apple();
        $answer = isset($apple->isTasteGood);

        $this->assertTrue($answer);
    }
}