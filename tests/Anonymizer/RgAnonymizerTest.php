<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\RgAnonymizer;
use Exception;
use PHPUnit\Framework\TestCase;

class RgAnonymizerTest extends TestCase
{
    public function testCpfMaskWithSeparators()
    {
        $this->assertEquals(
            '12.345.***-*',
            (new RgAnonymizer('12.345.678-0'))->anonymized()
        );
    }

    public function testCpfMaskWithoutSeparators()
    {
        $this->assertEquals(
            '12345****',
            (new RgAnonymizer('123456780'))->anonymized()
        );
    }

    public function testInvalidValue()
    {
        $this->expectException(Exception::class);
        (new RgAnonymizer('invalid'));
    }
}
