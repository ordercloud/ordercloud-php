<?php namespace Ordercloud\Entities\Auth;

class AccessToken
{
    /**
     * @var string
     * @reflectName access_token
     */
    private $token;
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
        $this->token = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->expiresIn = $expiresIn;
    }

    /**
     * Create a new access token from php $_REQUEST.
     *
     * @return static
     */
    public static function createFromInput()
    {
        return static::createFromArray($_REQUEST);
    }

    /**
     * Create a new access token from an indexed array.
     *
     * @param array $data
     *
     * @return static
     */
    public static function createFromArray(array $data = null)
    {
        return new static($data['access_token'], $data['refresh_token'], $data['expires']);
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
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
        return $this->token;
    }
}
