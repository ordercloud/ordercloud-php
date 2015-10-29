<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetUserByIdRequest
 *
 * @see Ordercloud\Requests\Users\Handlers\GetUserByIdRequestHandler
 */
class GetUserByIdRequest implements Command
{
    /**
     * @var int
     */
    private $userID;

    /**
     * @param int $userID
     */
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
