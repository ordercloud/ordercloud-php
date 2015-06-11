<?php namespace Ordercloud\Entities\Organisations;

class OrganisationAccessToken
{
    /** @var string */
    private $token;
    /** @var int */
    private $expires;
    /** @var int */
    private $expiryDate;
    /** @var bool */
    private $valid;

    public function __construct($token, $expires, $expiryDate, $valid)
    {
        $this->token = $token;
        $this->expires = $expires;
        $this->expiryDate = $expiryDate;
        $this->valid = $valid;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return int
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @return int
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }
}
