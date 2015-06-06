<?php namespace Ordercloud\Support;

use Illuminate\Container\Container;
use Ordercloud\Support\CommandBus\IlluminateCommandHandlerTranslator;
use Ordercloud\Support\Http\GuzzleClient;

class QuickStart
{
    public static function create($baseUrl, $username, $password, $organisationToken)
    {
        $container = new Container();

        $container->singleton('Ordercloud\Ordercloud');
        $container->singleton('Ordercloud\Support\Parser');
        $container->singleton('Ordercloud\Support\Http\UrlParameteriser', 'Ordercloud\Support\Http\LeagueUrlParameteriser');
        $container->singleton('Ordercloud\Support\CommandBus\CommandBus', 'Ordercloud\Support\CommandBus\ExecutingCommandBus');
        $container->singleton('Ordercloud\Support\CommandBus\CommandHandlerTranslator', function() use ($container) {
            return new IlluminateCommandHandlerTranslator($container);
        });
        $container->singleton('Ordercloud\Support\Http\Client', function() use ($baseUrl, $username, $password, $organisationToken) {
            return new GuzzleClient($baseUrl, $username, $password, $organisationToken);
        });

        return $container->make('Ordercloud\Ordercloud');
    }
}
