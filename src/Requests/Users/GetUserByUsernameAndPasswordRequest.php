<?php namespace Ordercloud\Requests\Users;

class GetUserByUsernameAndPasswordRequest extends GetLoggedInUserRequest
{
    public function __construct($username, $password)
    {
        parent::__construct(null, $username, $password);
    }
}
