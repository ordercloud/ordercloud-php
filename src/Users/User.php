<?php namespace Ordercloud\Users;

use Ordercloud\Organisations\Organisation;

class User
{
    /** @var int */
    private $id;
    /** @var boolean */
    private $enabled;
    /** @var string */
    private $username;
    /** @var  */ //TODO
    private $facebook_id;
    /** @var string */
    private $password; //TODO eh?
    /** @var UserProfile */
    private $profile;
    /** @var array| */
    private $groups;
    /** @var array| */
    private $roles;
    /** @var array|Organisation[] */
    private $organisations;
}
