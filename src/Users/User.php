<?php namespace Ordercloud\Users;

use Ordercloud\Organisations\OrganisationShort;

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

    function __construct($id, $enabled, $username, $facebook_id, UserProfile $profile, array $groups, array $roles, array $organisations)
    {
        parent::__construct($id, $username, $profile);
        $this->enabled = $enabled;
        $this->facebook_id = $facebook_id;
        $this->groups = $groups;
        $this->roles = $roles;
        $this->organisations = $organisations;
    }
}
