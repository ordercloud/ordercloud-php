<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Users\UpdateUserAddressRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class UpdateUserAddressRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param UpdateUserAddressRequest $request
     */
    protected function configure($request)
    {
        $address = $request->getAddress();

        $this->setUrl('resource/users/geos/%d', $address->getId())
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
        return $response;
    }
}
