<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\GetRegisterUrlRequest;
use Ordercloud\Requests\Handlers\AbstractRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;

class GetRegisterUrlRequestHandler extends AbstractRequestHandler
{
    /**
     * @param GetRegisterUrlRequest $request
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
            'register'        => 'register'
        ];
        $this->headers = ['Content-type' => 'application/x-www-form-urlencoded'];
    }

    protected function transformResponse($response)
    {
        return $response->getUrl();
    }
}
