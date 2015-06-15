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
        $address = $request->getAddress();

        $this->setUrl('resource/users/%d/geos', $request->getUserID())
            ->setParameters([
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
            ]);
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
