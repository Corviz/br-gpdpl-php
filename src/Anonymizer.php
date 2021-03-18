<?php


namespace Corviz\BrGpdpl;


use Exception;

abstract class Anonymizer
{
    /**
     * @var string
     */
    private $original;

    /**
     * @var string
     */
    private $anonymous;

    /**
     * @return string
     */
    protected static abstract function getPattern() : string;

    /**
     * @param string $original
     * @return bool
     */
    public static function matches(string $original) : bool
    {
        return !!preg_match(static::getPattern(), $original);
    }

    /**
     * @return string
     */
    public function anonymized() : string
    {
        if (!isset($this->anonymous)) {
            $this->anonymous = $this->anonymize($this->original, static::getPattern());
        }

        return $this->anonymous;
    }

    /**
     * @return string
     */
    public function original() : string
    {
        return $this->original;
    }

    /**
     * @param string $original
     * @param string $pattern
     * @return string
     */
    protected abstract function anonymize(string $original, string $pattern) : string;

    /**
     * Anonymizer constructor.
     * @param string $original
     */
    public function __construct(string $original)
    {
        if (!static::matches($original)) {
            throw new Exception("'$original' does not match current anonymizer.");
        }

        $this->original = $original;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->anonymized();
    }
}
