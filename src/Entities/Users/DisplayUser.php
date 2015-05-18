<?php namespace Ordercloud\Entities\Users;

class DisplayUser
{
    /** @var int */
    private $id;
    /** @var string */
    private $username;

    function __construct($id, $username)
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
}
