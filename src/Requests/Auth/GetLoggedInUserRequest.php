<?php namespace Ordercloud\Requests\Auth;

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

    protected function __construct($accessToken = null, $username = null, $password = null)
    {
        $this->accessToken = $accessToken;
        $this->username = $username;
        $this->password = $password;
    }

    public static function createWithAccessToken($accessToken)
    {
        return new static($accessToken);
    }

    public static function createWithUsernamePassword($username, $password)
    {
        return new static(null, $username, $password);
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getAuthHeader()
    {
        if ($this->username && $this->password) {
            return 'BASIC ' . base64_encode("{$this->username}:{$this->password}");
        }

        return null;
    }
}
