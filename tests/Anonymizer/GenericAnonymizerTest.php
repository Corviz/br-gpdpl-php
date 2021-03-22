<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\GenericAnonymizer;
use PHPUnit\Framework\TestCase;

class GenericAnonymizerTest extends TestCase
{
    public function testAnonymizeString()
    {
        $this->assertEquals(
            str_repeat('*', 8),
            (new GenericAnonymizer('mystring'))->anonymized()
        );
    }

    public function testKeepStart()
    {
        $this->assertEquals(
            'my'.str_repeat('*', 6),
            (new GenericAnonymizer('mystring', 2))->anonymized()
        );
    }

    public function testKeepEnd()
    {
        $this->assertEquals(
            str_repeat('*', 6).'ng',
            (new GenericAnonymizer('mystring', 0, 2))->anonymized()
        );
    }
}
