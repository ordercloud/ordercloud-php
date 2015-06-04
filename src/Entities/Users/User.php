<?php namespace Ordercloud\Entities\Users;

use Ordercloud\Entities\Organisations\OrganisationShort;

class User extends UserShort
{
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $facebook_id;
    /** @var array| */
    private $groups;
    /** @var array| */
    private $roles;
    /** @var array|OrganisationShort[] */
    private $organisations;

    public function __construct($id, $enabled, $username, $facebook_id, UserProfile $profile, array $groups, array $roles, array $organisations)
    {
        parent::__construct($id, $username, $profile);
        $this->enabled = $enabled;
        $this->facebook_id = $facebook_id;
        $this->groups = $groups;
        $this->roles = $roles;
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
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return array|\Ordercloud\Entities\Organisations\OrganisationShort[]
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }
}
