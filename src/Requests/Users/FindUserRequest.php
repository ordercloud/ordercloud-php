<?php namespace Ordercloud\Requests\Users;

use Ordercloud\Support\CommandBus\Command;

class FindUserRequest implements Command
{
    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var string
     */
    private $mobileNumber;

    /**
     * @param string $emailAddress
     */
    public function __construct($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getEmailAddress ()
    {
        return $this->emailAddress;
    }

    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }
}
