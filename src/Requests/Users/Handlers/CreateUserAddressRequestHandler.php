<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Users\CreateUserAddressRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateUserAddressRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreateUserAddressRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("resource/users/%d/geos", $request->getUserID());

        $address = $request->getAddress();
        $this->parameters = [
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
        ];
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
