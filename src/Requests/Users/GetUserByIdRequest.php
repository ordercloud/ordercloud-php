<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

class GetUserByIdRequest implements Command
{
    /**
     * @var int
     */
    private $userID;

    public function __construct($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return int
     */
    public function getUserID()
    {
        return $this->userID;
    }
}
