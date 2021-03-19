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
        return '/^((\+\d{2})?( ?)(\(?)(\d{2})(\)?)( ?))?(\d{4,5})(-?)(\d{4})$/';
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        return preg_replace($pattern, '$2$3$4**$6$7****$9$10', $original);
    }
}
