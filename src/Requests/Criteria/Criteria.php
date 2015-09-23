<?php namespace Ordercloud\Requests\Criteria;

class Criteria
{
    protected function __construct()
    {
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }
}
