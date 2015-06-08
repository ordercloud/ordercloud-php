<?php namespace Ordercloud\Entities\Auth;

class AccessToken
{
    /**
     * @var string
     * @reflectName access_token
     */
    private $accessToken;
    /**
     * @var string
     * @reflectName refresh_token
     */
    private $refreshToken;
    /**
     * @var int
     * @reflectName expires_in
     */
    private $expiresIn;

    public function __construct($accessToken, $refreshToken, $expiresIn)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->expiresIn = $expiresIn;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @return int
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    public function __toString()
    {
        return $this->accessToken;
    }
}
