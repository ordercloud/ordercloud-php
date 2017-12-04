<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Organisations\CreatenOrganisationRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateOrganisationRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreatenOrganisationRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/organisations')
            ->setBodyParameters([
                'name'                      => $request->getName(),
                'code'                      => $request->getCode(),
                'types'                     => $request->getTypes(),
                'industry'                  => $request->getIndustry(),
                'timezoneOffset'            => $request->getTimezoneOffset(),
                'registeredDirectly'        => $request->isRegisteredDirectly(),
                'connectionCode'            => $request->getConnectionTypeCode(),
                'notificationSourceEmail'   => $request->getNotificationSourceEmail(),
                'operatingHours'            => $request->getOperatingHours(),
                'currencyCode'              => $request->getCurrencyCode(),
                'billingProfile'            => $request->getBillingProfile()
            ]);
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
