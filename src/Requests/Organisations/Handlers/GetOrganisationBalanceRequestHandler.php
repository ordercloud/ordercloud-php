<?php namespace Ordercloud\Requests\Organisations\Handlers;

use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Organisations\GetOrganisationBalanceRequest;
use Ordercloud\Support\Http\Response;

class GetOrganisationBalanceRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrganisationBalanceRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('resource/organisations/%d/balance', $request->getOrganisationId())
            ->setQueryParameters(array_filter([
                'from'             => $request->getFrom(),
                'upto'             => $request->getUpTo(),
                'transactiontypes' => $request->getTransactionTypes(),
            ]));
    }

    /**
     * @param Response $response
     *
     * @return float
     */
    protected function transformResponse($response)
    {
        return $response->getData('balance');
    }
}
