<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\NameAnonymizer;
use Exception;
use PHPUnit\Framework\TestCase;

class NameAnonymizerTest extends TestCase
{
    public function testFullName()
    {
        $this->assertEquals(
            'João********a',
            (new NameAnonymizer('João da Silva'))->anonymized()
        );
    }

    public function testShortenedName()
    {
        $this->assertEquals(
            'José********o',
            (new NameAnonymizer('José S. Francisco'))->anonymized()
        );
    }

    public function testFirstName()
    {
        $this->assertEquals(
            'Carl********s',
            (new NameAnonymizer('Carlos'))->anonymized()
        );
    }

    public function testInvalidValue()
    {
        $this->expectException(Exception::class);
        (new NameAnonymizer('.'));
    }
}
