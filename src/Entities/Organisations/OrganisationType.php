<?php namespace Ordercloud\Entities\Organisations;

use JsonSerializable;

class OrganisationType implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $plural;

    public function __construct($id, $name, $plural)
    {
        $this->id = $id;
        $this->name = $name;
        $this->plural = $plural;
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

    /**
     * @return string
     */
    public function getPlural()
    {
        return $this->plural;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'plural' => $this->getPlural(),
        ];
    }
}
