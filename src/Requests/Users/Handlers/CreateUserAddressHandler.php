<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\CreateUserAddress;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class CreateUserAddressHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;
    /** @var Parser */
    private $parser;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->ordercloud = $ordercloud;
        $this->parser = $parser;
    }

    /**
     * @param CreateUserAddress $request
     *
     * @return UserShort
     */
    public function handle($request)
    {
        $userID = $request->getUserID();
        $address = $request->getAddress();

        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_POST,
                "resource/users/{$userID}/geos",
                [
                    'name'         => $address->getName(),
                    'streetNumber' => $address->getStreetNumber(),
                    'streetName'   => $address->getStreetName(),
                    'complex'      => $address->getComplex(),
                    'suburb'       => $address->getSuburb(),
                    'city'         => $address->getCity(),
                    'postalCode'   => $address->getPostalCode(),
                    'note'         => $address->getNote(),
                    'latitude'     => $address->getLatitude(),
                    'longitude'    => $address->getLongitude(),
                    'access_token' => $request->getAccessToken()
                ]
            )
        );

        var_dump($response);

        return $this->parser->parseResourceIDFromURL($response->getUrl());
    }
}
