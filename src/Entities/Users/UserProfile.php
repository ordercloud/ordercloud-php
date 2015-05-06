<?php namespace Ordercloud\Entities\Users;

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

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @return string
     */
    public function getCellphoneNumber()
    {
        return $this->cellphoneNumber;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }
}
