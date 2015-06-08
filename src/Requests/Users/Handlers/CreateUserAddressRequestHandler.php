<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\CreateUserAddressRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\EntityReflector;

class CreateUserAddressRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param CreateUserAddressRequest $request
     *
     * @return int
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

        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
