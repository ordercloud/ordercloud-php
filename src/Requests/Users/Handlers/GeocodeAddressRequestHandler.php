<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Users\GeocodeAddressRequest;

class GeocodeAddressRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param GeocodeAddressRequest $request
     */
    protected function configure($request)
    {
        $address = $request->getAddress();

        $this->setUrl('resource/users/geocode')
            ->setBodyParameters([
                'streetName'   => $address->getStreetName(),
                'streetNumber' => $address->getStreetNumber(),
                'city'         => $address->getCity(),
                'suburb'       => $address->getSuburb(),
                'complex'      => $address->getComplex(),
                'postalCode'   => $address->getPostalCode(),
            ])
            ->setEntityClass('Ordercloud\Entities\Addresses\GeoCoordinates');
    }
}
