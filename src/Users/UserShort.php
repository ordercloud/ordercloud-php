<?php namespace Ordercloud\Users;

class UserShort extends DisplayUser
{
    /** @var UserProfile */
    private $profile;

    function __construct($id, $username, $profile)
    {
        parent::__construct($id, $username);
        $this->profile = $profile;
    }
}
