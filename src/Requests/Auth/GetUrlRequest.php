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
    protected function __construct($organisationID, $clientSecret, $redirectUrl, $type, $mobile = false)
    {
        $this->organisationID = $organisationID;
        $this->clientSecret = $clientSecret;
        $this->redirectUrl = $redirectUrl;
        $this->type = $type;
        $this->mobile = $mobile;
    }

    /**
     * @param int    $organisationID
     * @param string $clientSecret
     * @param string $redirectUrl
     * @param bool   $mobile
     *
     * @return static
     */
    public static function forLogin($organisationID, $clientSecret, $redirectUrl, $mobile = false)
    {
        return new static($organisationID, $clientSecret, $redirectUrl, 'login', $mobile);
    }

    /**
     * @param int    $organisationID
     * @param string $clientSecret
     * @param string $redirectUrl
     * @param bool   $mobile
     *
     * @return static
     */
    public static function forRegister($organisationID, $clientSecret, $redirectUrl, $mobile = false)
    {
        return new static($organisationID, $clientSecret, $redirectUrl, 'register', $mobile);
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
