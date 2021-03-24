<?php

namespace Corviz\BrGpdpl\Anonymizer;

use Corviz\BrGpdpl\Anonymizer;

class CreditCardNumberAnonymizer extends Anonymizer
{
    /**
     * @inheritDoc
     */
    protected static function getPattern(): string
    {
        return '/^(\d{4}([ \-]?)\d{2})\d{2}([ \-]?)\d{4}([ \-]?\d{4})$/';
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        return preg_replace($pattern, '$1**$3****$4', $original);
    }
}
