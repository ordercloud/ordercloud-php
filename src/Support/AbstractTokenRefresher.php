<?php namespace Ordercloud\Support;

use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Auth\RefreshAccessTokenRequest;

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

    /**
     * @param Ordercloud $ordercloud
     *
     * @return AccessToken
     */
    public function refresh(Ordercloud $ordercloud)
    {
        $refreshRequest = new RefreshAccessTokenRequest($this->organisationCode, $this->clientSecret, $this->refreshToken);

        $accessToken = $ordercloud->exec($refreshRequest);

        $this->onAccessTokenRefreshed($accessToken);

        return $accessToken;
    }

    abstract public function onAccessTokenRefreshed(AccessToken $accessToken);
}
