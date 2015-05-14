<?php namespace Ordercloud;

use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Support\CommandBus\Command;
use Ordercloud\Support\CommandBus\CommandBus;
use Ordercloud\Support\Http\Response;

class Ordercloud
{
    /** @var CommandBus */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * TODO
     *
     * @param Command $command
     *
     * @return Response
     */
    public function exec(Command $command)
    {
        return $this->commandBus->execute($command);
    }
}
