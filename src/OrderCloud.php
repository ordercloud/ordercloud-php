<?php namespace OrderCloud\OrderCloud;

class OrderCloud implements OrdercloudInterface
{
    public function getConnectedMarketPlaces($marketPlaceId)
    {
        // TODO: Implement getConnectedMarketPlaces() method.
    }

    public function getStore($storeId)
    {
        // TODO: Implement getStore() method.
    }

    public function getAllMarketPlaces()
    {
        // TODO: Implement getAllMarketPlaces() method.
    }

    public function getProductsByMarketPlace($marketPlaceId, $category, $auhType, $access_token = null)
    {
        // TODO: Implement getProductsByMarketPlace() method.
    }

    public function getProduct($productId, $auhType, $access_token = null)
    {
        // TODO: Implement getProduct() method.
    }

    public function getOAuthUrl($redirectUrl, $login, $mobile, $clientSecret, $organisationId)
    {
        // TODO: Implement getOAuthUrl() method.
    }

    public function getUserDetails($access_token)
    {
        // TODO: Implement getUserDetails() method.
    }

    public function createAddressForUser($userId, $name, $streetName, $city, array $addressDetails = [], $auhType, $access_token = null)
    {
        // TODO: Implement createAddressForUser() method.
    }

    public function createOrder($userId, array $items, $paymentStatus, $deliveryType, $amount, $userGeoId = null)
    {
        // TODO: Implement createOrder() method.
    }

    public function getUserAddresses($userId, $auhType, $access_token = null)
    {
        // TODO: Implement getUserAddresses() method.
    }

    public function getOrdersForUser($userId, $auhType, $access_token = null, $page = 1, $pageSize = 10, array $orderStatuses = [], array $paymentStatuses = [], $sort = 'date+')
    {
        // TODO: Implement getOrdersForUser() method.
    }

    public function getMenu($selectedStoreId)
    {
        // TODO: Implement getMenu() method.
    }

    public function getNewAccessToken($refreshToken)
    {
        // TODO: Implement getNewAccessToken() method.
    }

    public function createCreditCardPayment($paymentGateway, $amount, $budgetPeriod, $cardExpiryMonth, $cardExpiryYear, $nameOnCard, $cvv, $cardNumber, $orderRef, $description, $testMode, $access_token)
    {
        // TODO: Implement createCreditCardPayment() method.
    }

    public function getProfile($userId)
    {
        // TODO: Implement getProfile() method.
    }

    public function updateProfile($userId, $firstName, $lastName, $nickName, $email, $cellPhoneNumber, $gender)
    {
        // TODO: Implement updateProfile() method.
    }

    public function getSettingsForOrganisation()
    {
        // TODO: Implement getSettingsForOrganisation() method.
    }

    public function getSettingsForOrganisationByKeyName($keyName)
    {
        // TODO: Implement getSettingsForOrganisationByKeyName() method.
    }
}
