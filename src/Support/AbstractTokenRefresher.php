<?php namespace Ordercloud\Support;

use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Services\AuthService;

abstract class AbstractTokenRefresher implements TokenRefresher
{
    /**
     * @var string
     */
    private $organisationCode;
    /**
     * @var string
     */
    private $clientSecret;
    /**
     * @var string
     */
    private $refreshToken;

    /**
     * @param string $organisationCode
     * @param string $clientSecret
     * @param string $refreshToken
     */
    public function __construct($organisationCode, $clientSecret, $refreshToken)
    {
        $this->organisationCode = $organisationCode;
        $this->clientSecret = $clientSecret;
        $this->refreshToken = $refreshToken;
    }

    public function refresh(AuthService $auth)
    {
        $accessToken = $auth->refreshAccessToken($this->organisationCode, $this->clientSecret, $this->refreshToken);

        $this->onAccessTokenRefreshed($accessToken);

        return $accessToken;
    }

    abstract public function onAccessTokenRefreshed(AccessToken $accessToken);
}
