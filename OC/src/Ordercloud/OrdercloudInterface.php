<?php namespace Ordercloud\Ordercloud;

interface OrdercloudInterface
{
    const DELIVERY_TYPE_DELIVERY = "DELIVERY";
    const DELIVERY_TYPE_SELFPICKUP = "SELFPICKUP";

    const PAYMENT_STATUS_PAID = "PAID";
    const PAYMENT_STATUS_UNPAID = "UNPAID";

    const AUTH_TYPE_TOKEN = "token";
    const AUTH_TYPE_BASIC = "basic";

    const PAYMENT_GATEWAY_MYGATE_ZA = "MYGATE_ZA";
    const PAYMENT_GATEWAY_PAYU_ZA = "PAYU_ZA";

    /**
     * Gets all the market places connected to the store
     *
     * @param int $marketPlaceId
     *
     * @return array  array of market places which the store is connected to
     *
     * @throws OrdercloudException
     */
    public function getConnectedMarketPlaces($marketPlaceId);

    /**
     * Gets all the stores for a market place
     *
     * @param int $storeId
     *
     * @return array
     *
     * @throws OrdercloudException
     */
    public function getStore($storeId);

    /**
     * Gets all the market places
     *
     * @return array
     *
     * @throws OrdercloudException
     */
    public function getAllMarketPlaces();

    /**
     * Gets all products for a market place
     *
     * @param int    $marketPlaceId Id of the market place which products are requested for
     * @param string $category      Tags to search for
     * @param string $auhType       The type of auth to use
     * @param string $access_token  The access_token to use
     *
     * @return array Products for market place
     *
     * @throws OrdercloudException
     */
    public function getProductsByMarketPlace($marketPlaceId, $category, $auhType, $access_token);

    /**
     * Gets the product matching the given id.
     *
     * @param int    $productId The id of the product
     * @param string $auhType
     * @param string $access_token
     *
     * @return array the product
     *
     * @throws OrdercloudException
     */
    public function getProduct($productId, $auhType, $access_token);

    /**
     * Gets the URL for the user to be directed with OAuth
     *
     * @param string $redirectUrl    The url which the OAuth returns the user to
     * @param bool   $login          true for login page, false for register page
     * @param bool   $mobile         True for mobile false for desktop
     * @param string $clientSecret   The clients secret
     * @param int    $organisationId The client
     *
     * @return string The url to redirect to
     *
     * @throws OrdercloudException
     */
    public function getOAuthUrl($redirectUrl, $login, $mobile, $clientSecret, $organisationId);

    /**
     * Gets the user from the access token after the OAuth took place
     *
     * @param string $access_token The access_token to use
     *
     * @return array the user
     *
     * @throws OrdercloudException
     */
    public function getUserDetails($access_token);

    /**
     * Get the users addresses
     *
     * @param int    $userId       The ID of the user
     * @param string $auhType      The type of auth to use
     * @param string $access_token The access_token to use
     *
     * @return array user addresses
     *
     * @throws OrdercloudException
     */
    public function getUserAddresses($userId, $auhType, $access_token);

    /**
     * Creates an address for the user
     *
     * @param int            $userId         The ID of the user the address is being created for
     * @param string         $name           The name for the address
     * @param string         $streetName     The street name
     * @param string         $city           The city
     * @param array|string[] $addressDetails Other details which are not required (streetNumber, complex, suburb, postalCode, note, longitude, latitude)
     * @param string         $auhType        The type of auth to use
     * @param string         $access_token   The access_token to use
     *
     * @return int the id of the created address
     *
     * @throws OrdercloudException
     */
    public function createAddressForUser($userId, $name, $streetName, $city, array $addressDetails = [], $auhType, $access_token);

    /**
     * Creates an order for the user
     *
     * @param int          $userId        The id of the user which the order is for
     * @param array        $items         The items of the order
     * @param string       $paymentStatus UNPAID or PAID
     * @param string       $deliveryType  SELFPICKUP or DELIVERY
     * @param string|float $amount        The total for the order
     * @param int          $userGeoId     The address ID for the order destination
     *
     * @throws OrdercloudException
     */
    public function createOrder($userId, array $items, $paymentStatus, $deliveryType, $amount, $userGeoId);

    /**
     * gets all the orders for a user
     *
     * @param int    $userId       The users id
     * @param string $auhType      The type of auth to use
     * @param string $access_token The access_token to use
     *
     * @return array the order for the user
     *
     * @throws OrdercloudException
     */
    public function getOrderForUser($userId, $auhType, $access_token);

    /**
     * Gets all the menu tags for a certain organisation
     *
     * @param int $selectedStoreId The ID of the stores you want the menu items for
     *
     * @return array of tags
     *
     * @throws OrdercloudException
     */
    public function getMenu($selectedStoreId);

    /**
     * Get a new access token from the refresh token
     *
     * @param string $refreshToken The refresh token which will be used to fetch a new access token
     *
     * @return string A new access token
     *
     * @throws OrdercloudException
     */
    public function getNewAccessToken($refreshToken);

    /**
     * Gets the settings for an organisation
     *
     * @param strign       $paymentGateway  The selected payment gateway
     * @param string|float $amount          Amount to be charged
     * @param string       $budgetPeriod    In months, pass 0 months for straight, max of 48 months (4 years)
     * @param string       $cardExpiryMonth The expiry month
     * @param string       $cardExpiryYear  The expiry year
     * @param string       $nameOnCard      The name on the card
     * @param string       $cvv             cvv number of the credit card
     * @param string       $cardNumber      the credit card number
     * @param string       $orderRef        The order ID
     * @param string       $description     The description for what they will be charged for
     * @param string       $testMode        Whether test mode is on
     * @param string       $access_token
     *
     * @throws OrdercloudException
     */
    public function createCreditCardPayment(
        $paymentGateway,
        $amount,
        $budgetPeriod,
        $cardExpiryMonth,
        $cardExpiryYear,
        $nameOnCard,
        $cvv,
        $cardNumber,
        $orderRef,
        $description,
        $testMode,
        $access_token
    );

    /**
     * Retrieves the profile for the given user id
     *
     * @param int $userId
     *
     * @return array
     *
     * @throws OrdercloudException
     */
    public function getProfile($userId);

    /**
     * Update the profile for the given user id
     *
     * @param int $userId
     * @param string $firstName
     * @param string $lastName
     * @param string $nickName
     * @param string $email
     * @param string $cellPhoneNumber
     * @param string $gender
     *
     * @return array
     *
     * @throws OrdercloudException
     */
    public function updateProfile($userId, $firstName, $lastName, $nickName, $email, $cellPhoneNumber, $gender);
}
