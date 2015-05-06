<?php namespace Ordercloud\Support\CommandBus;

interface CommandHandler
{
    /**
     * @param $request
     */
    public function handle($request);
}
