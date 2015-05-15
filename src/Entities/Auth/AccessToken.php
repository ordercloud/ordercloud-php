<?php namespace Ordercloud\Entities\Auth;

class AccessToken
{
    /** @var string */
    private $accessToken;
    /** @var string */
    private $refreshToken;
    /** @var int */
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
