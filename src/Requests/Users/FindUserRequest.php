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
     * @param string $mobileNumber
     */
    public function __construct($emailAddress, $mobileNumber)
    {
        $this->emailAddress = $emailAddress;
        $this->mobileNumber = $mobileNumber;
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
