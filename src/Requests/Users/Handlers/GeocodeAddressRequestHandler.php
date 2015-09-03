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
        $this->setUrl('resource/users/geocode')
            ->setParameters([
                'streetName'   => $request->getStreetName(),
                'streetNumber' => $request->getStreetNumber(),
                'city'         => $request->getCity(),
                'suburb'       => $request->getSuburb(),
                'complex'      => $request->getComplex(),
                'postalCode'   => $request->getPostalCode(),
            ])
            ->setEntityClass('Ordercloud\Entities\Users\UserAddress');
    }
}
