<?php namespace Ordercloud\Entities\Users;

use Ordercloud\Entities\Organisations\OrganisationShort;

class User extends UserShort
{
    /**
     * @var boolean
     */
    private $enabled;
    /**
     * @var string
     */
    private $facebook_id;
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

    public function __construct($id, $enabled, $username, $facebook_id, UserProfile $profile, array $groups, array $organisations)
    {
        parent::__construct($id, $username, $profile);
        $this->enabled = $enabled;
        $this->facebook_id = $facebook_id;
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
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
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
}
