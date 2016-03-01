<?php namespace Ordercloud\Services;

use Ordercloud\Entities\Addresses\Address;
use Ordercloud\Entities\Addresses\GeoCoordinates;
use Ordercloud\Entities\Users\NewUserAddress;
use Ordercloud\Entities\Users\User;
use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Requests\Auth\Entities\Authorisation;
use Ordercloud\Requests\Exceptions\UnauthorizedRequestException;
use Ordercloud\Requests\Users\CreateUserAddressRequest;
use Ordercloud\Requests\Users\CreateUserRequest;
use Ordercloud\Requests\Users\Criteria\UserAddressCriteria;
use Ordercloud\Requests\Users\DisableUserAddressRequest;
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
     *
     * @throws OrdercloudRequestException
     * @throws UnauthorizedRequestException
     */
    public function getLoggedInUser(Authorisation $authorisation = null)
    {
        return $this->request(new GetLoggedInUserRequest($authorisation));
    }

    /**
     * @param int $userId
     *
     * @return User
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function getUser($userId)
    {
        return $this->request(new GetUserByIdRequest($userId));
    }

    /**
     * @param int $userId
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function resetPassword($userId)
    {
        $this->request(new ResetUserPasswordRequest($userId));
    }

    /**
     * @param string|null $email
     * @param string|null $mobile
     *
     * @return User
     *
     * @throws OrdercloudRequestException
     */
    public function findUser($email = null, $mobile = null)
    {
        return $this->request(new FindUserRequest($email, $mobile));
    }

    /**
     * @param UserProfile $profile
     * @param string      $mobileNumberCountry
     * @param string|null $password
     * @param boolean     $sendWelcomeMessage
     * @param int[]       $groupIds
     *
     * @return int The new user's ID
     *
     * @throws OrdercloudRequestException
     */
    public function createUser(
        UserProfile $profile,
        array $groupIds = [],
        $mobileNumberCountry = 'ZA',
        $password = null,
        $sendWelcomeMessage = false
    ) {
        $this->request(
            new CreateUserRequest($profile, $groupIds, $mobileNumberCountry, $password, $sendWelcomeMessage)
        );
    }

    /**
     * @param int $userId
     *
     * @return UserProfile
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function getProfile($userId)
    {
        return $this->request(new GetUserProfileRequest($userId));
    }

    /**
     * @param int         $userId
     * @param UserProfile $profile
     *
     * @return UserProfile The updated user profile
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function updateProfile($userId, UserProfile $profile)
    {
        return $this->request(new UpdateUserProfileRequest($userId, $profile));
    }

    /**
     * @param int                 $userId
     * @param UserAddressCriteria $criteria
     *
     * @return UserAddress[]
     *
     * @throws OrdercloudRequestException
     */
    public function getAddresses($userId, UserAddressCriteria $criteria = null)
    {
        $criteria = $criteria ?: UserAddressCriteria::create();

        return $this->request(
            new GetUserAddressesRequest($userId, $criteria)
        );
    }

    /**
     * @param int $addressId
     *
     * @return UserAddress
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
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
     *
     * @throws OrdercloudRequestException
     */
    public function createAddress($userId, NewUserAddress $address)
    {
        return $this->request(
            new CreateUserAddressRequest($userId, $address)
        );
    }

    /**
     * @param UserAddress $address
     *
     * @throws OrdercloudRequestException
     */
    public function updateAddress(UserAddress $address)
    {
        $this->request(
            new UpdateUserAddressRequest($address)
        );
    }

    /**
     * @param int $addressId
     *
     * @throws OrdercloudRequestException
     * @throws NotFoundRequestException
     */
    public function disableAddress($addressId)
    {
        $this->request(
            new DisableUserAddressRequest($addressId)
        );
    }

    /**
     * @param Address $address
     *
     * @return GeoCoordinates
     *
     * @throws OrdercloudRequestException
     */
    public function geocodeAddress(Address $address)
    {
        return $this->request(
            new GeocodeAddressRequest($address)
        );
    }
}
