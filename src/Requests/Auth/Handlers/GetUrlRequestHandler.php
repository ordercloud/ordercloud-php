<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\GetUrlRequest;
use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;

class GetUrlRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param GetUrlRequest $request
     */
    protected function configure($request)
    {
        $type = $request->getType();

        $this->setUrl('faces/credential')
            ->setFormParameters([
                'organisation_id' => $request->getOrganisationID(),
                'client_secret'   => $request->getClientSecret(),
                'redirect_url'    => $request->getRedirectUrl(),
                'mobile'          => $request->isMobile(),
                $type             => $type
            ]);
    }

    protected function transformResponse($response)
    {
        return $response->getUrl();
    }
}
