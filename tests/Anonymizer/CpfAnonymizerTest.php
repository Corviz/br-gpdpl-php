<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\CpfAnonymizer;
use Exception;
use PHPUnit\Framework\TestCase;

class CpfAnonymizerTest extends TestCase
{
    public function testCpfMaskWithSeparators()
    {
        $this->assertEquals(
            '111.***.***-**',
            (new CpfAnonymizer('111.111.111-11'))->anonymized()
        );
    }

    public function testCpfMaskWithoutSeparators()
    {
        $this->assertEquals(
            '111********',
            (new CpfAnonymizer('11111111111'))->anonymized()
        );
    }

    public function testInvalidValue()
    {
        $this->expectException(Exception::class);
        (new CpfAnonymizer('invalid'));
    }
}
