<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;

abstract class AbstractPostRequestHandler extends AbstractRequestHandler
{
    protected $method = OrdercloudRequest::METHOD_POST;
}
