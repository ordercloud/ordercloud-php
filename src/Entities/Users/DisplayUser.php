<?php namespace Ordercloud\Entities\Users;

use JsonSerializable;

class DisplayUser implements JsonSerializable
{
    /** @var int */
    private $id;
    /** @var string */
    private $username;

    public function __construct($id, $username)
    {
        $this->id = $id;
        $this->username = $username;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
        ];
    }
}
