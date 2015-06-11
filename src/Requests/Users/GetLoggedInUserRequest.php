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
     * @param string $accessToken
     *
     * @return static
     */
    public static function createWithAccessToken($accessToken)
    {
        return new static($accessToken);
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return static
     */
    public static function createWithUsernamePassword($username, $password)
    {
        return new static(null, $username, $password);
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
