<?php namespace Ordercloud\Entities\Users;

use JsonSerializable;

class UserGroup implements JsonSerializable
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /**
     * @var array|UserRole[]
     * @reflectType Ordercloud\Entities\Users\UserRole
     */
    private $roles;

    public function __construct($id, $name, $description, array $roles)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->roles = $roles;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return array|UserRole[]
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'roles' => $this->getRoles(),
        ];
    }
}
