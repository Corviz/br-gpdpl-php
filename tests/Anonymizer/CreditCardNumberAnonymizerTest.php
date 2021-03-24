<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\CreditCardNumberAnonymizer;
use Exception;
use PHPUnit\Framework\TestCase;

class CreditCardNumberAnonymizerTest extends TestCase
{
    public function testNoSeparators()
    {
        self::assertEquals(
            '123412******1234',
            (new CreditCardNumberAnonymizer('1234123412341234'))->anonymized()
        );
    }

    public function testSpaceSeparators()
    {
        self::assertEquals(
            '1234 12** **** 1234',
            (new CreditCardNumberAnonymizer('1234 1234 1234 1234'))->anonymized()
        );
    }

    public function testDashSeparators()
    {
        self::assertEquals(
            '1234-12**-****-1234',
            (new CreditCardNumberAnonymizer('1234-1234-1234-1234'))->anonymized()
        );
    }

    public function testInvalidValue()
    {
        $this->expectException(Exception::class);
        (new CreditCardNumberAnonymizer('invalid'));
    }
}
