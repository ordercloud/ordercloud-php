<?php namespace Ordercloud\Entities\Users;

use JsonSerializable;

class UserShort extends DisplayUser implements JsonSerializable
{
    /** @var UserProfile */
    private $profile;

    /**
     * @param int         $id
     * @param string      $username
     * @param UserProfile $profile
     */
    public function __construct($id, $username, UserProfile $profile)
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

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['profile'] = $this->getProfile();

        return $json;
    }
}
