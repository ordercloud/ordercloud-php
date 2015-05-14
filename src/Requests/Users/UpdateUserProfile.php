<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Support\CommandBus\Command;

class UpdateUserProfile implements Command
{
    /** @var UserProfile */
    private $profile;
    /** @var null */
    private $accessToken;
    /** @var int */
    private $userID;

    public function __construct($userID, UserProfile $profile, $accessToken = null)
    {
        $this->userID = $userID;
        $this->profile = $profile;
        $this->accessToken = $accessToken;
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

    /**
     * @return null
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
