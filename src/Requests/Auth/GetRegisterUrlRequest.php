<?php namespace Ordercloud\Requests\Auth;

class GetRegisterUrlRequest extends GetUrlRequest
{
    public function __construct($organisationID, $clientSecret, $redirectUrl, $mobile = false)
    {
        parent::__construct($organisationID, $clientSecret, $redirectUrl, 'register', $mobile);
    }
}
