<?php namespace Ordercloud\Users;

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
}
