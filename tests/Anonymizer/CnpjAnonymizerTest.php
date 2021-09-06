<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\CnpjAnonymizer;
use Exception;
use PHPUnit\Framework\TestCase;

class CnpjAnonymizerTest extends TestCase
{
    public function testCpfMaskWithSeparators()
    {
        $this->assertEquals(
            '11.1**.***/1111-**',
            (new CnpjAnonymizer('11.111.111/1111-11'))->anonymized()
        );
    }

    public function testCpfMaskWithoutSeparators()
    {
        $this->assertEquals(
            '111*****1111**',
            (new CnpjAnonymizer('11111111111111'))->anonymized()
        );
    }

    public function testInvalidValue()
    {
        $this->expectException(Exception::class);
        (new CnpjAnonymizer('invalid'));
    }
}
