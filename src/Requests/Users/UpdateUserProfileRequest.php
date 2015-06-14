<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Support\CommandBus\Command;

class UpdateUserProfileRequest implements Command
{
    /** @var UserProfile */
    private $profile;
    /** @var int */
    private $userID;

    public function __construct($userID, UserProfile $profile)
    {
        $this->userID = $userID;
        $this->profile = $profile;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return UserProfile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
