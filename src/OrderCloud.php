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

    public function getProductsByMarketPlace($marketPlaceId, $category, $auhType, $access_token)
    {
        // TODO: Implement getProductsByMarketPlace() method.
    }

    public function getProduct($productId, $auhType, $access_token)
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

    public function getUserAddresses($userId, $auhType, $access_token)
    {
        // TODO: Implement getUserAddresses() method.
    }

    public function createAddressForUser($userId, $name, $streetName, $city, $addressDetails = [], $auhType, $access_token)
    {
        // TODO: Implement createAddressForUser() method.
    }

    public function createOrder($userId, array $items, $paymentStatus, $deliveryType, $amount, $userGeoId)
    {
        // TODO: Implement createOrder() method.
    }

    public function getOrderForUser($userId, $auhType, $access_token)
    {
        // TODO: Implement getOrderForUser() method.
    }

    public function getMenu($selectedStoreId)
    {
        // TODO: Implement getMenu() method.
    }

    public function getNewAccessToken($refreshToken)
    {
        // TODO: Implement getNewAccessToken() method.
    }

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
    ) {
        // TODO: Implement createCreditCardPayment() method.
    }
}
