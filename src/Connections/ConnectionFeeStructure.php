<?php namespace Ordercloud\Connections;

class ConnectionFeeStructure
{
    /** @var integer */
    private $id;
    /** @var string */
    private $code;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $rule;
    /** @var string */
    private $rule_name;
    /** @var boolean */
    private $percentage;
    /** @var boolean */
    private $flatfee;
    /** @var boolean */
    private $volume;

    function __construct($id, $code, $name, $description, $rule, $rule_name, $percentage, $flatfee, $volume)
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->rule = $rule;
        $this->rule_name = $rule_name;
        $this->percentage = $percentage;
        $this->flatfee = $flatfee;
        $this->volume = $volume;
    }
}
