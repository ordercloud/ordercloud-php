<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Requests\Auth\Entities\Authorisation;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class GetLoggedInUserRequest
 *
 * @see Ordercloud\Requests\Users\Handlers\GetLoggedInUserRequestHandler
 */
class GetLoggedInUserRequest implements Command
{
    /**
     * @var Authorisation
     */
    private $authorisation;

    /**
     * @param Authorisation $authorisation
     */
    public function __construct(Authorisation $authorisation = null)
    {
        $this->authorisation = $authorisation;
    }

    /**
     * @return Authorisation|null
     */
    public function getAuthorisation()
    {
        return $this->authorisation;
    }
}
