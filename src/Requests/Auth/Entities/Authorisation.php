<?php namespace Ordercloud\Requests\Auth\Entities;

class Authorisation
{
    private $authorisation;

    /**
     * @param string $authorisation
     */
    protected function __construct($authorisation)
    {
        $this->authorisation = $authorisation;
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return static
     */
    public static function createWithUsernamePassword($username, $password)
    {
        $auth = base64_encode("{$username}:{$password}");
        return new static("BASIC $auth");
    }

    /**
     * @param string $accessToken
     *
     * @return static
     */
    public static function createWithAccessToken($accessToken)
    {
        return new static("BEARER $accessToken");
    }

    /**
     * @return string
     */
    public function getAuthorisation()
    {
        return $this->authorisation;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getAuthorisation();
    }
}
