<?php namespace Ordercloud\Users;

class ShortUser
{
    /** @var int */
    private $id;
    /** @var string */
    private $username;
    /** @var UserProfile */
    private $profile;

    function __construct($id, $username, $profile)
    {
        $this->id = $id;
        $this->username = $username;
        $this->profile = $profile;
    }
}
