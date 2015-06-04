<?php namespace Ordercloud\Support;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\Auth\Handlers\GetLoginUrlHandler;
use Ordercloud\Requests\Auth\Handlers\GetRegisterUrlHandler;
use Ordercloud\Requests\Auth\Handlers\RefreshAccessTokenHandler;
use Ordercloud\Requests\Connections\Handlers\GetChildConnectionsHandler;
use Ordercloud\Requests\Connections\Handlers\GetMarketplaceConnectionsHandler;
use Ordercloud\Requests\Handlers\OrdercloudRequestHandler;
use Ordercloud\Requests\Orders\Handlers\CreateOrderHandler;
use Ordercloud\Requests\Orders\Handlers\GetUserOrdersHandler;
use Ordercloud\Requests\Organisations\Handlers\GetOrganisationRequestHandler;
use Ordercloud\Requests\Payments\Handlers\CreateCreditCardPaymentHandler;
use Ordercloud\Requests\Products\Handlers\GetOrganisationProductsByTagNamesHandler;
use Ordercloud\Requests\Products\Handlers\GetProductHandler;
use Ordercloud\Requests\Products\Handlers\GetProductTagsForOrganisationByTypeNameHandler;
use Ordercloud\Requests\Settings\Handlers\GetSettingsByOrganisationHandler;
use Ordercloud\Requests\Users\Handlers\CreateUserAddressHandler;
use Ordercloud\Requests\Users\Handlers\GetUserAddressesHandler;
use Ordercloud\Requests\Users\Handlers\GetUserByAccessTokenHandler;
use Ordercloud\Requests\Users\Handlers\GetUserByIDHandler;
use Ordercloud\Requests\Users\Handlers\GetUserProfileHandler;
use Ordercloud\Requests\Users\Handlers\UpdateUserProfileHandler;
use Ordercloud\Support\CommandBus\ArrayCommandHandlerTranslator;
use Ordercloud\Support\CommandBus\ExecutingCommandBus;
use Ordercloud\Support\Http\GuzzleClient;
use Ordercloud\Support\Http\LeagueUrlParameteriser;
use Ordercloud\Support\Parser;

class QuickStart
{
    public static function create($baseUrl, $username, $password, $organisationToken)
    {
        $ordercloud = null;

        $parser = new Parser();

        $client = new GuzzleClient($baseUrl, $username, $password, $organisationToken);

        $parameteriser = new LeagueUrlParameteriser();

        $requestHandler = new OrdercloudRequestHandler($client, $parameteriser);

        $commandHandlerTranslator = self::setupCommandHandlerTranslator($requestHandler, $parser, $ordercloud);

        $commandBus = new ExecutingCommandBus($commandHandlerTranslator);

        $ordercloud = new Ordercloud($commandBus);

        return $ordercloud;
    }

    /**
     * @param $requestHandler
     * @param $parser
     * @param $ordercloud
     *
     * @return ArrayCommandHandlerTranslator
     */
    private static function setupCommandHandlerTranslator($requestHandler, $parser, &$ordercloud)
    {
        $commandHandlerTranslator = new ArrayCommandHandlerTranslator(
            [
                'Ordercloud\Requests\OrdercloudRequest'                            => $requestHandler,
                'Ordercloud\Requests\Organisations\GetOrganisationRequest'         => function () use (&$ordercloud, $parser) {
                    return new GetOrganisationRequestHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Connections\GetMarketplaceConnections'        => function () use (&$ordercloud, $parser) {
                    return new GetMarketplaceConnectionsHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Connections\GetChildConnections'              => function () use (&$ordercloud, $parser) {
                    return new GetChildConnectionsHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Products\GetOrganisationProductsByTagNames'   => function () use (&$ordercloud, $parser) {
                    return new GetOrganisationProductsByTagNamesHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Products\GetProduct'                          => function () use (&$ordercloud, $parser) {
                    return new GetProductHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Users\GetUserAddresses'                       => function () use (&$ordercloud, $parser) {
                    return new GetUserAddressesHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Orders\GetUserOrders'                         => function () use (&$ordercloud, $parser) {
                    return new GetUserOrdersHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Products\GetProductTagsForOrganisationByType' => function () use (&$ordercloud, $parser) {
                    return new GetProductTagsForOrganisationByTypeNameHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Settings\GetSettingsByOrganisation'           => function () use (&$ordercloud, $parser) {
                    return new GetSettingsByOrganisationHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Users\GetUserProfile'                         => function () use (&$ordercloud, $parser) {
                    return new GetUserProfileHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Users\UpdateUserProfile'                      => function () use (&$ordercloud, $parser) {
                    return new UpdateUserProfileHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Users\GetUserByAccessToken'                   => function () use (&$ordercloud, $parser) {
                    return new GetUserByAccessTokenHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Users\CreateUserAddress'                      => function () use (&$ordercloud, $parser) {
                    return new CreateUserAddressHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Auth\GetLoginUrl'                             => function () use (&$ordercloud) {
                    return new GetLoginUrlHandler($ordercloud);
                },
                'Ordercloud\Requests\Auth\GetRegisterUrl'                          => function () use (&$ordercloud) {
                    return new GetRegisterUrlHandler($ordercloud);
                },
                'Ordercloud\Requests\Auth\RefreshAccessToken'                      => function () use (&$ordercloud, $parser) {
                    return new RefreshAccessTokenHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Orders\CreateOrder'                           => function () use (&$ordercloud, $parser) {
                    return new CreateOrderHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Payments\CreateCreditCardPayment'             => function () use (&$ordercloud, $parser) {
                    return new CreateCreditCardPaymentHandler($ordercloud, $parser);
                },
                'Ordercloud\Requests\Users\GetUserByID'                            => function () use (&$ordercloud, $parser) {
                    return new GetUserByIDHandler($ordercloud, $parser);
                },
            ]
        );

        return $commandHandlerTranslator;
    }
}
