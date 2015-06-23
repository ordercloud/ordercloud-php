<?php namespace Ordercloud\Requests\Auth;

use Ordercloud\Requests\Exceptions\InvalidAccessTokenException;
use Ordercloud\Support\CommandBus\Command;
use Ordercloud\Support\Http\OrdercloudHttpException;

class InvalidTokenRequest implements Command
{
    /**
     * @var Command
     */
    private $previousRequest;
    /**
     * @var InvalidAccessTokenException
     */
    private $exception;

    /**
     * @param Command                     $request
     * @param InvalidAccessTokenException $exception
     */
    public function __construct(Command $request, InvalidAccessTokenException $exception)
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
     * @return InvalidAccessTokenException
     */
    public function getException()
    {
        return $this->exception;
    }
}
