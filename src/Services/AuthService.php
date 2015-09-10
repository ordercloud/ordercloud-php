<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Requests\Auth\GetLoginUrlRequest;
use Ordercloud\Requests\Auth\GetRegisterUrlRequest;
use Ordercloud\Requests\Auth\RefreshAccessTokenRequest;

class AuthService extends OrdercloudService
{
    /**
     * @param int        $organisationID
     * @param string     $clientSecret
     * @param string     $redirectUrl
     * @param bool|false $mobile
     *
     * @return string
     */
    public function getLoginUrl($organisationID, $clientSecret, $redirectUrl, $mobile = false)
    {
        return $this->request(
            new GetLoginUrlRequest($organisationID, $clientSecret, $redirectUrl, $mobile)
        );
    }

    /**
     * @param int        $organisationID
     * @param string     $clientSecret
     * @param string     $redirectUrl
     * @param bool|false $mobile
     *
     * @return string
     */
    public function getRegisterUrl($organisationID, $clientSecret, $redirectUrl, $mobile = false)
    {
        return $this->request(
            new GetRegisterUrlRequest($organisationID, $clientSecret, $redirectUrl, $mobile)
        );
    }

    /**
     * @param $organisationCode
     * @param $clientSecret
     * @param $refreshToken
     *
     * @return AccessToken
     */
    public function refreshAccessToken($organisationCode, $clientSecret, $refreshToken)
    {
        return $this->request(
            new RefreshAccessTokenRequest($organisationCode, $clientSecret, $refreshToken)
        );
    }

}
