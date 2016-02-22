<?php namespace Ordercloud\Entities\Users;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;

class User extends UserShort implements JsonSerializable
{
    /**
     * @var boolean
     */
    private $enabled;

    public function __construct($id, $enabled, $username, UserProfile $profile)
    {
        parent::__construct($id, $username, $profile);
        $this->enabled = $enabled;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['enabled'] = $this->isEnabled();

        return $json;
    }
}
