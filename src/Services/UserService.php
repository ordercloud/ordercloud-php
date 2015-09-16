<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Users\User;
use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Requests\Auth\Entities\Authorisation;
use Ordercloud\Requests\Users\CreateUserAddressRequest;
use Ordercloud\Requests\Users\DisableUserAddressRequest;
use Ordercloud\Requests\Users\Entities\NewUserAddress;
use Ordercloud\Requests\Users\FindUserRequest;
use Ordercloud\Requests\Users\GeocodeAddressRequest;
use Ordercloud\Requests\Users\GetLoggedInUserRequest;
use Ordercloud\Requests\Users\GetUserAddressByIdRequest;
use Ordercloud\Requests\Users\GetUserAddressesRequest;
use Ordercloud\Requests\Users\GetUserByIdRequest;
use Ordercloud\Requests\Users\GetUserProfileRequest;
use Ordercloud\Requests\Users\ResetUserPasswordRequest;
use Ordercloud\Requests\Users\UpdateUserAddressRequest;
use Ordercloud\Requests\Users\UpdateUserProfileRequest;

class UserService extends OrdercloudService
{
    /**
     * @param Authorisation|null $authorisation
     *
     * @return User
     */
    public function getLoggedInUser(Authorisation $authorisation = null)
    {
        return $this->request(
            new GetLoggedInUserRequest($authorisation)
        );
    }

    /**
     * @param int $userId
     *
     * @return User
     */
    public function getUser($userId)
    {
        return $this->request(
            new GetUserByIdRequest($userId)
        );
    }

    /**
     * @param int $userId
     */
    public function resetPassword($userId)
    {
        $this->request(
            new ResetUserPasswordRequest($userId)
        );
    }

    /**
     * @param string|null $email
     * @param string|null $mobile
     *
     * @return User
     */
    public function findUser($email = null, $mobile = null)
    {
        return $this->request(
            new FindUserRequest($email, $mobile)
        );
    }

    /**
     * @param int $userId
     *
     * @return UserProfile
     */
    public function getProfile($userId)
    {
        return $this->request(
            new GetUserProfileRequest($userId)
        );
    }

    /**
     * @param int         $userId
     * @param UserProfile $profile
     *
     * @return UserProfile The updated user profile
     */
    public function updateProfile($userId, UserProfile $profile)
    {
        return $this->request(
            new UpdateUserProfileRequest($userId, $profile)
        );
    }
    /**
     * @param int $userId
     *
     * @return UserAddress[]
     */
    public function getAddresses($userId)
    {
        return $this->request(
            new GetUserAddressesRequest($userId)
        );
    }

    /**
     * @param int $addressId
     *
     * @return UserAddress
     */
    public function getAddress($addressId)
    {
        return $this->request(
            new GetUserAddressByIdRequest($addressId)
        );
    }

    /**
     * @param int            $userId
     * @param NewUserAddress $address
     *
     * @return int The new address ID
     */
    public function createAddress($userId, NewUserAddress $address)
    {
        return $this->request(
            new CreateUserAddressRequest($userId, $address)
        );
    }

    /**
     * @param UserAddress $address
     */
    public function updateAddress(UserAddress $address)
    {
        $this->request(
            new UpdateUserAddressRequest($address)
        );
    }

    /**
     * @param int $addressId
     */
    public function disableAddress($addressId)
    {
        $this->request(
            new DisableUserAddressRequest($addressId)
        );
    }

    /**
     * @param string $streetNumber
     * @param string $streetName
     * @param string $complex
     * @param string $suburb
     * @param string $city
     * @param string $postalCode
     *
     * @return UserAddress
     */
    public function geocodeAddress($streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
    {
        return $this->request(
            new GeocodeAddressRequest($streetNumber, $streetName, $complex, $suburb, $city, $postalCode)
        );
    }
}
