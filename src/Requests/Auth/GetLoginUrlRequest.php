<?php namespace Ordercloud\Requests\Auth;

class GetLoginUrlRequest extends GetUrlRequest
{
    public function __construct($organisationID, $clientSecret, $redirectUrl, $mobile = false)
    {
        parent::__construct($organisationID, $clientSecret, $redirectUrl, 'login', $mobile);
    }
}
