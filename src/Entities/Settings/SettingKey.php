<?php namespace Ordercloud\Entities\Settings;

class SettingKey
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
