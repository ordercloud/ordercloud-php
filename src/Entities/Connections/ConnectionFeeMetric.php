<?php namespace Ordercloud\Entities\Connections;

class ConnectionFeeMetric
{
    /** @var int */
    private $id;
    /** @var string */
    private $code;
    /** @var string */
    private $name;
    /** @var string */
    private $description;

    function __construct($id, $code, $name, $description)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
    }
}
