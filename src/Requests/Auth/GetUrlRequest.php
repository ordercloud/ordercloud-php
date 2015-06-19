<?php namespace Ordercloud\Requests\Auth;

use Ordercloud\Support\CommandBus\Command;

class GetUrlRequest implements Command
{
    /**
     * @var int
     */
    private $organisationID;
    /**
     * @var string
     */
    private $clientSecret;
    /**
     * @var string
     */
    private $redirectUrl;
    /**
     * @var bool
     */
    private $mobile;
    /**
     * @var string
     */
    private $type;

    /**
     * @param int    $organisationID
     * @param string $clientSecret
     * @param string $redirectUrl
     * @param string $type
     * @param bool   $mobile
     */
    public function __construct($organisationID, $clientSecret, $redirectUrl, $type, $mobile = false)
    {
        $this->organisationID = $organisationID;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl = $redirectUrl;
        $this->type = $type;
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return boolean
     */
    public function isMobile()
    {
        return $this->mobile;
    }
}
