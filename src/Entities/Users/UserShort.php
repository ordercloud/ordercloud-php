<?php namespace Ordercloud\Entities\Users;

class UserShort extends DisplayUser
{
    /** @var UserProfile */
    private $profile;

    public function __construct($id, $username, $profile)
    {
        parent::__construct($id, $username);
        $this->profile = $profile;
    }

    /**
     * @return UserProfile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
