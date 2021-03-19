<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\PhoneAnonymizer;
use Exception;
use PHPUnit\Framework\TestCase;

class PhoneAnonymizerTest extends TestCase
{
    public function testPhoneMaskWithoutRegion()
    {
        $this->assertEquals(
            '******-1234',
            (new PhoneAnonymizer('3000-1234'))->anonymized()
        );
    }

    public function testCelphoneMaskWithoutRegion()
    {
        $this->assertEquals(
            '******-1234',
            (new PhoneAnonymizer('90000-1234'))->anonymized()
        );
    }

    public function testPhoneMaskWithDdd()
    {
        $this->assertEquals(
            '(**) ****-1234',
            (new PhoneAnonymizer('(11) 3000-1234'))->anonymized()
        );
    }

    public function testCelphoneMaskDdi()
    {
        $this->assertEquals(
            '+55 ** ****-5678',
            (new PhoneAnonymizer('+55 11 91234-5678'))->anonymized()
        );
    }

    public function testCelphoneMaskDdiDigitsonly()
    {
        $this->assertEquals(
            '+55******5678',
            (new PhoneAnonymizer('+5511912345678'))->anonymized()
        );
    }

    public function testInvalidValue()
    {
        $this->expectException(Exception::class);
        (new PhoneAnonymizer('invalid'));
    }
}
