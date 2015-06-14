<?php namespace Ordercloud\Requests\Users;

class GetUserByAccessTokenRequest extends GetLoggedInUserRequest
{
    public function __construct($accessToken)
    {
        parent::__construct($accessToken);
    }
}
