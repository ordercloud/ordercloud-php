<?php namespace Ordercloud\Requests\Organisations;

use Ordercloud\Support\CommandBus\Command;

class GetOrganisationAccessTokenRequest implements Command
{
    /** @var integer */
    private $organisationID;
    /** @var string|null */
    private $username;
    /** @var string|null */
    private $password;

    /**
     * @param int         $organisationID
     * @param string|null $username
     * @param string|null $password
     */
    public function __construct($organisationID, $username = null, $password = null)
    {
        $this->organisationID = $organisationID;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
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
