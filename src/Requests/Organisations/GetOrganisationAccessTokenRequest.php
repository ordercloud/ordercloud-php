<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationAccessTokenRequest implements Command
{
    /** @var integer */
    private $organisationID;
    /** @var string|null */
    private $accessToken;
    /** @var string|null */
    private $username;
    /** @var string|null */
    private $password;

    protected function __construct($organisationID, $accessToken = null, $username = null, $password = null)
    {
        $this->organisationID = $organisationID;
        $this->accessToken = $accessToken;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @param int    $organisationID
     * @param string $accessToken
     *
     * @return static
     */
    public static function createWithAccessToken($organisationID, $accessToken)
    {
        return new static($organisationID, $accessToken);
    }

    /**
     * @param int    $organisationID
     * @param string $username
     * @param string $password
     *
     * @return static
     */
    public static function createWithUsernamePassword($organisationID, $username, $password)
    {
        return new static($organisationID, null, $username, $password);
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string|null
     */
    public function getAuthHeader()
    {
        if (empty($this->username) && empty($this->password)) {
            return null;
        }

        return 'BASIC ' . base64_encode("{$this->username}:{$this->password}");
    }
}
