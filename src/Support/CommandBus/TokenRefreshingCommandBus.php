<?php namespace Ordercloud\Support\CommandBus;

use Ordercloud\Requests\Auth\InvalidTokenRequest;
use Ordercloud\Requests\Exceptions\InvalidAccessTokenException;

class TokenRefreshingCommandBus implements CommandBus
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Command $command
     */
    public function execute(Command $command)
    {
        try {
            return $this->commandBus->execute($command);
        }
        catch (InvalidAccessTokenException $e) {
            return $this->commandBus->execute(new InvalidTokenRequest($command, $e));
        }
    }
}
