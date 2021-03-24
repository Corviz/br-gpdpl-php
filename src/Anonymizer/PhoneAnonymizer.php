<?php

namespace Corviz\BrGpdpl\Anonymizer;

use Corviz\BrGpdpl\Anonymizer;

class PhoneAnonymizer extends Anonymizer
{
    /**
     * @inheritDoc
     */
    protected static function getPattern(): string
    {
        return '/^((\+\d{1,3})?( ?)(\(?)(\d+)(\)?)( ?))?(\d+)(-?)(\d{4})$/';
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        $matches = [];
        preg_match($pattern, $original, $matches);

        $ddi = $matches[2];
        $lastNumbers = $matches[10];
        unset($matches[0], $matches[1], $matches[2], $matches[10]);

        //preg_replace('/\d/', '*', $matches);
        foreach ($matches as &$match) {
            $match = preg_replace('/\d/', '*', $match);
        }

        return $ddi.implode('', $matches).$lastNumbers;
    }
}
