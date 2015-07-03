<?php namespace Ordercloud\Support\CommandBus;

use Ordercloud\Requests\Auth\ExpiredTokenRequest;
use Ordercloud\Requests\Exceptions\AccessTokenExpiredException;

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
        catch (AccessTokenExpiredException $e) {
            return $this->commandBus->execute(new ExpiredTokenRequest($command, $e));
        }
    }
}
