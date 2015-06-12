<?php namespace Ordercloud\Requests\Handlers;

use Ordercloud\Requests\OrdercloudRequest;

abstract class AbstractGetRequestHandler extends AbstractRequestHandler
{
    protected $method = OrdercloudRequest::METHOD_GET;
}
