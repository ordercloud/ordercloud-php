<?php namespace Ordercloud\Support;

use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Services\AuthService;

interface TokenRefresher
{
    /**
     * @param AuthService $auth
     *
     * @return AccessToken
     * @internal param AuthService $ordercloud
     *
     */
    public function refresh(AuthService $auth);
}
