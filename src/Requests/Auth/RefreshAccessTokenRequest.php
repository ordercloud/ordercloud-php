<?php namespace Ordercloud\Requests\Auth;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class RefreshAccessTokenRequest
 *
 * @see Ordercloud\Requests\Auth\Handlers\RefreshAccessTokenRequestHandler
 */
class RefreshAccessTokenRequest implements Command
{
    /** @var string */
    private $organisationCode;
    /** @var string */
    private $clientSecret;
    /** @var string */
    private $refreshToken;

    public function __construct($organisationCode, $clientSecret, $refreshToken)
    {
        $this->organisationCode = $organisationCode;
        $this->clientSecret = $clientSecret;
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return string
     */
    public function getOrganisationCode()
    {
        return $this->organisationCode;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }
}
