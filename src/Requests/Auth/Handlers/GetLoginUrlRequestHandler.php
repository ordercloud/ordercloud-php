<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\GetLoginUrlRequest;
use Ordercloud\Requests\Handlers\AbstractRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;

class GetLoginUrlRequestHandler extends AbstractRequestHandler
{
    /**
     * @param GetLoginUrlRequest $request
     */
    protected function configure($request)
    {
        $this->method = OrdercloudRequest::METHOD_POST;
        $this->url = 'faces/credential';
        $this->parameters = [
            'organisation_id' => $request->getOrganisationID(),
            'client_secret'   => $request->getClientSecret(),
            'redirect_url'    => $request->getRedirectUrl(),
            'mobile'          => $request->isMobile(),
            'login'           => 'login'
        ];
        $this->headers = ['Content-type' => 'application/x-www-form-urlencoded'];
    }

    protected function transformResponse($response)
    {
        return $response->getUrl();
    }
}
