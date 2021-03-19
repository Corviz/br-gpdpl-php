<?php

namespace Anonymizer;

use Corviz\BrGpdpl\Anonymizer\EmailAnonymizer;
use Exception;
use PHPUnit\Framework\TestCase;

class EmailAnonymizerTest extends TestCase
{
    public function testEmailMask()
    {
        $this->assertEquals(
            't****@domain.com',
            (new EmailAnonymizer('test_123@domain.com'))->anonymized()
        );

        $this->assertEquals(
            'n****@domain.ext1.ext2.ru',
            (new EmailAnonymizer('next.test@domain.ext1.ext2.ru'))->anonymized()
        );
    }

    public function testInvalidValue()
    {
        $this->expectException(Exception::class);
        (new EmailAnonymizer('invalid'));
    }
}
