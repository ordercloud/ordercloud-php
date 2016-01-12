<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Requests\Handlers\AbstractPutRequestHandler;
use Ordercloud\Requests\Orders\GetOrderScheduleOptionsRequest;

class GetOrderScheduleOptionsRequestHandler extends AbstractPutRequestHandler
{
    /**
     * @param GetOrderScheduleOptionsRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/orders/schedule/options')
            ->setBodyParameter('organisations', $request->getOrganisationIds())
            ->setBodyParameter('fromDate', $request->getFromDate())
            ->setBodyParameter('toDate', $request->getToDate())
            ->setEntityArrayClass('Ordercloud\Entities\Orders\ScheduleOption');
    }
}
