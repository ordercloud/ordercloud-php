<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\AbstractGetUrlRequest;
use Ordercloud\Requests\Handlers\AbstractRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;

class UrlRequestHandler extends AbstractRequestHandler
{
    protected $method = OrdercloudRequest::METHOD_POST;
    protected $url = 'faces/credential';
    protected $headers = [
        'Content-type' => 'application/x-www-form-urlencoded'
    ];

    /**
     * @param AbstractGetUrlRequest $request
     */
    protected function configure($request)
    {
        $type = $request->getType();

        $this->parameters = [
            'organisation_id' => $request->getOrganisationID(),
            'client_secret'   => $request->getClientSecret(),
            'redirect_url'    => $request->getRedirectUrl(),
            'mobile'          => $request->isMobile(),
            $type             => $type
        ];
    }

    protected function transformResponse($response)
    {
        return $response->getUrl();
    }
}
