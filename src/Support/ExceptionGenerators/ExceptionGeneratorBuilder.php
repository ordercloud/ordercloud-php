<?php namespace Ordercloud\Support\ExceptionGenerators;

class ExceptionGeneratorBuilder
{
    /**
     * @var ExceptionGenerator
     */
    private $chain;
    /**
     * @var ExceptionGenerator
     */
    private $nextLink;

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param ExceptionGenerator $generator
     *
     * @return static
     */
    public function chain(ExceptionGenerator $generator)
    {
        if ( ! isset($this->nextLink)) {
            return $this->initChain($generator);
        }

        $this->nextLink->succeedWith($generator);

        $this->nextLink = $generator;

        return $this;
    }

    /**
     * @param ExceptionGenerator $generator
     *
     * @return static
     */
    protected function initChain(ExceptionGenerator $generator)
    {
        $this->chain = $generator;
        $this->nextLink = $generator;

        return $this;
    }

    /**
     * @return ExceptionGenerator
     */
    public function getChain()
    {
        return $this->chain;
    }
}
