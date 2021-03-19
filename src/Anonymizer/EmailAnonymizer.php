<?php


namespace Corviz\BrGpdpl\Anonymizer;


use Corviz\BrGpdpl\Anonymizer;

class EmailAnonymizer extends Anonymizer
{

    /**
     * @inheritDoc
     */
    protected static function getPattern(): string
    {
        return "/^([a-z]).+@(.+\\..+)+$/";
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        return preg_replace($pattern, '$1****@$2', $original);
    }
}