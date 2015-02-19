<?php namespace Ordercloud\Ordercloud;

interface OrdercloudInterface {

    /**
     * Gets all the market places connected to the store
     *
     * @param $marketPlaceId
     *
     * @return array - array of market places which the store is connected to
     *
     * @throws OrdercloudException
     */
    public function getConnectedMarketPlaces($marketPlaceId);

    /**
     * Gets all the stores for a market place
     * @param $storeId
     *
     * @return array
     *
     * @throws OrdercloudException
     */
    public function getStore($storeId);

    /**
     * Gets all the market places
     *
     * @return mixed
     *
     * @throws OrdercloudException
     */
    public function getAllMarketPlaces();

    /**
     * Gets all products for a market place
     *
     * @param $marketPlaceId - Id of the market place which products are requested for
     * @param $category - Tags to search for
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return array - Products for market place
     */
    public function getProductsByMarketPlace($marketPlaceId, $category, $auhType, $access_token);

    /**
     * Gets the products
     *
     * @param $productId - The id of the product
     *
     * @return array - the product
     *
     * @throws OrdercloudException
     *
     */
    public function getProduct($productId, $auhType, $access_token);

    /**
     * Gets the URL for the user to be directed with OAuth
     *
     * @param $redirectUrl - The url which the OAuth returns the user to
     * @param $login - true for login page, false for register page
     * @param $mobile - True for mobile false for desktop
     * @param $clientSecret - The clients secret
     * @param $organisationId - The client
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return string - The url to redirect to
     *
     * @throws OrdercloudException
     */
    public function getOAuthUrl($redirectUrl, $login, $mobile, $clientSecret, $organisationId);

    /**
     * Gets the user from the access token after the OAuth took place
     *
     * @param $access_token The access_token to use
     *
     * @return array - the user
     *
     * @throws OrdercloudException
     */
    public function getUserDetails($access_token);

    /**
     * Get the users addresses
     *
     * @param $userId - The ID of the user
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return array - user addresses
     *
     * @throws OrdercloudException
     */
    public function getUserAddresses($userId, $auhType, $access_token);

    /**
     * Creates an address for the user
     *
     * @param $userId - The ID of the user the address is being created for
     * @param $name - The name for the address
     * @param $streetName - The street name
     * @param $city - The city
     * @param $addressDetails - Other details which are not required (streetNumber, complex, suburb, postalCode, note, longitude, latitude)
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return the id of the created address
     *
     * @throws OrdercloudException
     */
    public function createAddressForUser($userId, $name, $streetName, $city, $addressDetails = array(), $auhType, $access_token);

    /**
     * Creates an order for the user
     *
     * @param $userId - the id of the user which the order is for
     * @param $items - The items for the order
     * @param $paymentStatus - the payment status UNPAID or PAID
     * @param $deliveryType - SELFPICKUP or DELIVERY
     * @param $amount - The total for the order
     * @param $userGeoId - The address for ID for the order
     *
     * @throws OrdercloudException
     */
    public function createOrder($userId, $items, $paymentStatus, $deliveryType, $amount, $userGeoId);

    /**
     * gets all the orders for a user
     *
     * @param $userId the users id
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return array the order for the user
     *
     * @throws OrdercloudException
     */
    public function getOrderForUser($userId, $auhType, $access_token);

    /**
     * Gets all the menu tags for a certain organisation
     *
     * $param $selectedStoreId - The ID of the stores you want the menu items for
     *
     * @return array of tags
     *
     * @throws OrdercloudException
     */
    public function getMenu($selectedStoreId);

    /**
     * Get a new access token from the refresh token
     *
     * @param $refreshToken - The refresh token which will be used to fetch a new access token
     *
     * @return A new access token
     */
    public function getNewAccessToken($refreshToken);

}