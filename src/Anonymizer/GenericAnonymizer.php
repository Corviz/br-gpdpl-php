<?php

namespace Corviz\BrGpdpl\Anonymizer;

use Corviz\BrGpdpl\Anonymizer;
use Exception;

class GenericAnonymizer extends Anonymizer
{
    /**
     * @var int
     */
    private $keepAtStart;

    /**
     * @var int
     */
    private $keepAtEnd;

    /**
     * @inheritDoc
     */
    protected static function getPattern(): string
    {
        return '/.*/';
    }

    /**
     * @inheritDoc
     */
    protected function anonymize(string $original, string $pattern): string
    {
        $start = $this->keepAtStart > 0 ? substr($original, 0, $this->keepAtStart) : '';
        $end = $this->keepAtEnd > 0 ? substr($original, -($this->keepAtEnd)) : '';

        $repeat = strlen($original) - ($this->keepAtStart + $this->keepAtEnd);
        $anonymous = $repeat > 0 ? str_repeat('*', $repeat) : '';

        return "{$start}{$anonymous}{$end}";
    }

    /**
     * GenericAnonymizer constructor.
     *
     * @param string $original
     * @param int    $keepAtStart
     * @param int    $keepAtEnd
     *
     * @throws Exception
     */
    public function __construct(string $original, int $keepAtStart = 0, int $keepAtEnd = 0)
    {
        $this->keepAtStart = $keepAtStart;
        $this->keepAtEnd = $keepAtEnd;

        parent::__construct($original);
    }
}
