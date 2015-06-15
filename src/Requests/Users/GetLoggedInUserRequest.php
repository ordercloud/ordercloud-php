<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Requests\Auth\Entities\Authorisation;
use Ordercloud\Support\CommandBus\Command;

class GetLoggedInUserRequest implements Command
{
    /**
     * @var Authorisation
     */
    private $authorisation;

    /**
     * @param Authorisation $authorisation
     */
    protected function __construct(Authorisation $authorisation = null)
    {
        $this->authorisation = $authorisation;
    }

    /**
     * @return string|null
     */
    public function getAuthHeader()
    {
        if (is_null($this->authorisation)) {
            return null;
        }

        return $this->authorisation->getAuthorisation();
    }
}
