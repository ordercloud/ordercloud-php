<?php namespace Ordercloud\Requests\Auth\Handlers;

use Ordercloud\Requests\Auth\GetUrlRequest;
use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;

class UrlRequestHandler extends AbstractPostRequestHandler
{
    protected $url = 'faces/credential';
    protected $headers = [
        'Content-type' => 'application/x-www-form-urlencoded'
    ];

    /**
     * @param GetUrlRequest $request
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
