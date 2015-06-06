<?php namespace Ordercloud\Requests\Auth;

use Ordercloud\Support\CommandBus\Command;

class GetRegisterUrlRequest implements Command
{
    /** @var int */
    private $organisationID;
    /** @var string */
    private $clientSecret;
    /** @var string */
    private $redirectUrl;
    /** @var bool */
    private $mobile;

    public function __construct($organisationID, $clientSecret, $redirectUrl, $mobile = false)
    {
        $this->organisationID = $organisationID;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl = $redirectUrl;
        $this->mobile = $mobile;
    }

    /**
     * @return int
     */
    public function getOrganisationID()
    {
        return $this->organisationID;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @return boolean
     */
    public function isMobile()
    {
        return $this->mobile;
    }
}
