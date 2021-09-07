<?php

namespace Corviz\BrGpdpl\Anonymizer;

use Corviz\BrGpdpl\Anonymizer;

class CnpjAnonymizer extends Anonymizer
{
    /**
     * @inheritDoc
     */
    protected static function getPattern(): string
    {
        return '/^([0-9]{2})([\\.]?)([0-9])[0-9]{2}([\\.]?)[0-9]{3}([\\/]?)([0-9]{4})([-]?)[0-9]{2}$/';
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        return preg_replace($pattern, '$1$2$3**$4***$5$6$7**', $original);
    }
}
