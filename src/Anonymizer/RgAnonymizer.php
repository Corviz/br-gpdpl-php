<?php

namespace Corviz\BrGpdpl\Anonymizer;

use Corviz\BrGpdpl\Anonymizer;

class RgAnonymizer extends Anonymizer
{
    /**
     * @inheritDoc
     */
    protected static function getPattern(): string
    {
        return '/^([0-9]{2})(\\.?)([0-9]{3})(\\.?)[0-9]{3}(-?)[0-9xX]$/';
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        return preg_replace($pattern, '$1$2$3$4***$5*', $original);
    }
}
