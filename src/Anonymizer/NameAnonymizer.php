<?php

namespace Corviz\BrGpdpl\Anonymizer;

use Corviz\BrGpdpl\Anonymizer;

class NameAnonymizer extends Anonymizer
{
    /**
     * @inheritDoc
     */
    protected static function getPattern(): string
    {
        return '/^(\w{1,3}\w)(([ \.]|\w)(\w?))*$/u';
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        return preg_replace($pattern, '$1********$4', $original);
    }
}
