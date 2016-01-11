<?php namespace Ordercloud\Entities\Users;

use JsonSerializable;
use Ordercloud\Entities\Organisations\OrganisationShort;

class User extends UserShort implements JsonSerializable
{
    /**
     * @var boolean
     */
    private $enabled;
    /**
     * @var array|UserGroup[]
     * @reflectType Ordercloud\Entities\Users\UserGroup
     */
    private $groups;
    /**
     * @var array|OrganisationShort[]
     * @reflectType Ordercloud\Entities\Organisations\OrganisationShort
     */
    private $organisations;

    public function __construct($id, $enabled, $username, UserProfile $profile, array $groups, array $organisations)
    {
        parent::__construct($id, $username, $profile);
        $this->enabled = $enabled;
        $this->groups = $groups;
        $this->organisations = $organisations;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return array|UserGroup[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return array|OrganisationShort[]
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    function jsonSerialize()
    {
        $json = parent::jsonSerialize();

        $json['enabled'] = $this->isEnabled();
        $json['groups'] = $this->getGroups();
        $json['organisations'] = $this->getOrganisations();

        return $json;
    }
}
