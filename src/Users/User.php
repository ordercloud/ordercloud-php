<?php namespace Ordercloud\Users;

use Ordercloud\Organisations\Organisation;

class User extends ShortUser
{
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $facebook_id;
    /** @var array| */
    private $groups;
    /** @var array| */
    private $roles;
    /** @var array|Organisation[] */
    private $organisations;

    function __construct($id, $enabled, $username, $facebook_id, $profile, $groups, $roles, $organisations)
    {
        parent::__construct($id, $username, $profile);
        $this->enabled = $enabled;
        $this->facebook_id = $facebook_id;
        $this->groups = $groups;
        $this->roles = $roles;
        $this->organisations = $organisations;
    }
}
