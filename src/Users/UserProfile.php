<?php namespace Ordercloud\Users;

class UserProfile
{
    /** @var string */
    private $firstName;
    /** @var string */
    private $surname;
    /** @var string */
    private $email;
    /** @var string */
    private $nickName;
    /** @var string */
    private $cellphoneNumber;
    /** @var string */
    private $sex;

    function __construct($firstName, $surname, $email, $nickName, $cellphoneNumber, $sex)
    {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->email = $email;
        $this->nickName = $nickName;
        $this->cellphoneNumber = $cellphoneNumber;
        $this->sex = $sex;
    }
}
