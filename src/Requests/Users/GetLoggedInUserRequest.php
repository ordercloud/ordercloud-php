<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

class GetLoggedInUserRequest implements Command
{
    /**
     * @var string|null
     */
    private $accessToken;
    /**
     * @var string|null
     */
    private $username;
    /**
     * @var string|null
     */
    private $password;

    /**
     * @param string|null $accessToken
     * @param string|null $username
     * @param string|null $password
     */
    protected function __construct($accessToken = null, $username = null, $password = null)
    {
        $this->accessToken = $accessToken;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string|null
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
