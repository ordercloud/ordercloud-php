<?php namespace Ordercloud\Requests\Auth;

use Ordercloud\Requests\Exceptions\AccessTokenExpiredException;
use Ordercloud\Support\CommandBus\Command;

/**
 * Class ExpiredTokenRequest
 *
 * @see Ordercloud\Requests\Auth\Handlers\ExpiredTokenRequestHandler
 */
class ExpiredTokenRequest implements Command
{
    /**
     * @var Command
     */
    private $previousRequest;
    /**
     * @var AccessTokenExpiredException
     */
    private $exception;

    /**
     * @param Command                     $request
     * @param AccessTokenExpiredException $exception
     */
    public function __construct(Command $request, AccessTokenExpiredException $exception)
    {
        $this->previousRequest = $request;
        $this->exception = $exception;
    }

    /**
     * @return Command
     */
    public function getPreviousRequest()
    {
        return $this->previousRequest;
    }

    /**
     * @return AccessTokenExpiredException
     */
    public function getException()
    {
        return $this->exception;
    }
}
