<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\EstimateDeliveryCostRequest;
use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Support\Http\Response;

class EstimateDeliveryCostRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param EstimateDeliveryCostRequest $request
     */
    protected function configure($request)
    {
        $orderingOrdganisationId = $request->getOrderingOrdganisationId();
        $geoId = $request->getGeoId();

        $this->setUrl('/resource/orders/organisation/%d/delivery/geo/%d', $orderingOrdganisationId, $geoId)
             ->setParameters($request->getMerchantDtos());
    }

    /**
     * @param Response $response
     *
     * @return float
     */
    protected function transformResponse($response)
    {
        //TODO: careful now, if null value (ie. error) then we're gonna have 0.0 as the estimate
        return floatval($response->getData('deliveryEstimate'));
    }
}
