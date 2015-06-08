<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

class GetUserByIdRequest implements Command
{
    /**
     * @var int
     */
    private $userID;
    /**
     * @var string|null
     */
    private $accessToken;

    public function __construct($userID, $accessToken = null)
    {
        $this->userID = $userID;
        $this->accessToken = $accessToken;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
