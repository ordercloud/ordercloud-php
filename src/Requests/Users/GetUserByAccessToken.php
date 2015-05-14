<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

class GetUserByAccessToken implements Command
{
    /** @var string */
    private $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
