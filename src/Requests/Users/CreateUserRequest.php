<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Support\CommandBus\Command;

class CreateUserRequest implements Command
{
    /**
     * @var UserProfile
     */
    private $profile;
    /**
     * @var string
     */
    private $mobileNumberCountry;
    /**
     * @var null|string
     */
    private $password;
    /**
     * @var bool
     */
    private $sendWelcomeMessage;
    /**
     * @var int[]
     */
    private $groupIds;

    /**
     * @param UserProfile $profile
     * @param string      $mobileNumberCountry
     * @param string|null $password
     * @param boolean     $sendWelcomeMessage
     * @param int[]       $groupIds
     */
    public function __construct(UserProfile $profile, array $groupIds = [], $mobileNumberCountry = 'ZA', $password = null, $sendWelcomeMessage = false)
    {
        $this->profile = $profile;
        $this->groupIds = $groupIds;
        $this->mobileNumberCountry = $mobileNumberCountry;
        $this->password = $password;
        $this->sendWelcomeMessage = $sendWelcomeMessage;
    }

    /**
     * @return UserProfile
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @return string
     */
    public function getMobileNumberCountry()
    {
        return $this->mobileNumberCountry;
    }

    /**
     * @return null|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return boolean
     */
    public function isSendWelcomeMessage()
    {
        return $this->sendWelcomeMessage;
    }

    /**
     * @return int[]
     */
    public function getGroupIds()
    {
        return $this->groupIds;
    }
}
