<?php namespace Ordercloud\Support;

use Ordercloud\Entities\Auth\AccessToken;
use Ordercloud\Ordercloud;

interface TokenRefresher
{
    /**
     * @param Ordercloud $ordercloud
     *
     * @return AccessToken
     */
    public function refresh(Ordercloud $ordercloud);
}
