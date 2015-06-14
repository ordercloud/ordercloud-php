<?php namespace Ordercloud\Requests\Users\Handlers;

use Ordercloud\Entities\Users\User;
use Ordercloud\Ordercloud;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Users\GetLoggedInUserRequest;
use Ordercloud\Requests\Users\GetUserByAccessTokenRequest;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Http\Response;
use Ordercloud\Support\Reflection\EntityReflector;

class GetUserByAccessTokenRequestHandler extends GetLoggedInUserRequest
{
}
