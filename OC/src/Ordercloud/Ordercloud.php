<?php namespace Ordercloud\Ordercloud;

use Guzzle\Http\Client;
use Config;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Log;

class Ordercloud implements OrdercloudInterface
{
    private $client = null;
    private $username = null;
    private $password = null;
    private $organisationId = null;
    private $clientSecret = null;
    private $log = null;

    private $requestConfig = [
        "Content-type"    => "application/json",
        'allow_redirects' => false
    ];

    /**
     * The constructor for the Ordercloud class, creates an http client from configured parameters
     *
     * @param $config array - Pass an array to load your own config or config/Ordercloud.php will be used
     */
    public function __construct(array $config = [])
    {
        if (empty($config)) {
            $this->client = new Client(Config::get('Ordercloud.base_url'));
            $this->client->setDefaultOption('verify', Config::get("Ordercloud.verify_ssl"));
            $this->username = Config::get("Ordercloud.username");
            $this->password = Config::get("Ordercloud.password");
            $this->clientSecret = Config::get("Ordercloud.client_secret");
            $this->organisationId = Config::get("Ordercloud.organisation_id");
        }
        else {
            $this->client = new Client($config["base_url"]);
            $this->client->setDefaultOption('verify', $config["verify_ssl"]);
            $this->username = $config["username"];
            $this->password = $config["password"];
            $this->clientSecret = $config["client_secret"];
            $this->organisationId = $config["organisation_id"];
        }
    }

    /**
     * Gets all the market places connected to the store
     *
     * @param $marketPlaceId
     *
     * @return array - array of market places which the store is connected to
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getConnectedMarketPlaces($marketPlaceId)
    {
        $request = $this->client->get(
            "/resource/organisations/$marketPlaceId/connections/type/M",
            $this->requestConfig
        );
        $request->setAuth($this->username, $this->password);
        try {
            return $request->send()->json()["results"];
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }


    /**
     * Gets all the stores for a market place
     *
     * @param $storeId
     *
     * @return array - returns the store details
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getStore($storeId)
    {
        $request = $this->client->get("/resource/organisations/$storeId", $this->requestConfig);
        $request->setAuth($this->username, $this->password);
        try {
            $response = $request->send();
            if ($response->getStatusCode() == 200) {
                return $response->json();
            }
            else {
                new OrdercloudException("could not retrieve store for ID: $storeId, response: ", $response->json());
            }
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets all the market places
     *
     * @return array of market places
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getAllMarketPlaces()
    {
        $request = $this->client->get(
            "/resource/organisations/" . $this->organisationId . "/connections/type/CH",
            $this->requestConfig
        );
        $request->setAuth($this->username, $this->password);
        try {
            return $request->send()->json()["results"];
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets all products for a market place
     *
     * @param $marketPlaceId - Id of the market place which products are requested for
     * @param $category      The categories to search in
     * @param $auhType       = OrdercloudInterface::AUTH_TYPE_BASIC The type of auth to use
     * @param $access_token  The access_token to use
     *
     * @return array - Products for market place
     */
    public function getProductsByMarketPlace($marketPlaceId, $category, $auhType = OrdercloudInterface::AUTH_TYPE_BASIC, $access_token = null)
    {
        $body = [
            "tags"          => [$category],
            "organisations" => [$marketPlaceId],
        ];

        if ($auhType == OrdercloudInterface::AUTH_TYPE_BASIC) {
            $request = $this->client->put("/resource/product/criteria", $this->requestConfig, json_encode($body));
            $request->setAuth($this->username, $this->password);
        }
        else {
            $request = $this->client->put(
                "/resource/product/criteria?access_token=" . $access_token,
                $this->requestConfig,
                json_encode($body)
            );
        }

        try {
            return $request->send()->json()["results"];
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets the products
     *
     * @param $productId    - Int The id of the product
     * @param $auhType      - String The type of auth to use
     * @param $access_token String access_token to use
     *
     * @return array - the product
     *
     * @throws OrdercloudException ClientErrorResponseException
     *
     */
    public function getProduct($productId, $auhType = OrdercloudInterface::AUTH_TYPE_BASIC, $access_token = null)
    {
        if ($auhType == OrdercloudInterface::AUTH_TYPE_BASIC) {
            $request = $this->client->get("/resource/product/$productId", $this->requestConfig);
            $request->setAuth($this->username, $this->password);
        }
        else {
            $request = $this->client->get(
                "/resource/product/$productId?access_token=" . $access_token,
                $this->requestConfig
            );
        }

        try {
            return $request->send()->json();
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets the URL for the user to be directed with OAuth
     *
     * @param $redirectUrl    - The url which the OAuth returns the user to
     * @param $login          - true for login page, false for register page
     * @param $mobile         - True for mobile false for desktop
     * @param $clientSecret   - THe client secret
     * @param $organisationId - The organisation id
     *
     * @return string - The url to redirect to
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getOAuthUrl($redirectUrl, $login, $mobile, $clientSecret, $organisationId)
    {
        $login = $login == true ? "login" : "register";
        $mobile = $mobile == true ? "on" : "off";
        $data = [
            "organisation_id" => $organisationId,
            "client_secret"   => $clientSecret,
            "redirect_url"    => $redirectUrl,
            "mobile"          => $mobile,
            $login            => $login
        ];

        $request = $this->client->post(
            "/faces/credential",
            ["Content-type" => "application/x-www-form-urlencoded", 'allow_redirects' => false],
            $data
        );
        $request->setAuth($this->username, $this->password);

        try {
            $response = $request->send();
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }

        return $response->getEffectiveUrl();
    }

    /**
     * Gets the user from the access token after the OAuth took place
     *
     * @param $access_token The access_token to use
     *
     * @return array - the user
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getUserDetails($access_token)
    {
        $request = $this->client->get("/resource/users/logged_in?access_token=" . $access_token, $this->requestConfig);

        try {
            return $request->send()->json();
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Get the users addressese
     *
     * @param $userId       - Int The ID of the user
     * @param $auhType      - String The type of auth to use
     * @param $access_token - String The access_token to use
     *
     * @return array - user addresses
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getUserAddresses($userId, $auhType = OrdercloudInterface::AUTH_TYPE_BASIC, $access_token = null)
    {
        if ($auhType == OrdercloudInterface::AUTH_TYPE_BASIC) {
            $request = $this->client->get("/resource/users/" . $userId . "/geos", $this->requestConfig);
            $request->setAuth($this->username, $this->password);
        }
        else {
            $request = $this->client->get(
                "/resource/users/" . $userId . "/geos?access_token=" . $access_token,
                $this->requestConfig
            );
        }

        try {
            return $request->send()->json()["results"];
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Creates an address for the user
     *
     * @param $userId         - Int The ID of the user the address is to be created for
     * @param $name           - String The name for the address
     * @param $streetName     - String The street name
     * @param $city           - String The city
     * @param $addressDetails - Array Other details which are not required (streetNumber, complex, suburb, postalCode, note, longitude, latitude)
     * @param $auhType        - String The type of auth to use
     * @param $access_token   - String The access_token to use
     *
     * @return Int - the id of the created address
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function createAddressForUser($userId, $name, $streetName, $city, array $addressDetails = [], $auhType = OrdercloudInterface::AUTH_TYPE_BASIC, $access_token = null)
    {
        $data = [
            "name"       => $name,
            "streetName" => $streetName,
            "city"       => $city
        ];

        $data += $addressDetails;

        if ($auhType == OrdercloudInterface::AUTH_TYPE_BASIC) {
            $request = $this->client->post(
                "/resource/users/" . $userId . "/geos",
                $this->requestConfig,
                json_encode($data)
            );
            $request->setAuth($this->username, $this->password);
        }
        else {
            $request = $this->client->post(
                "/resource/users/" . $userId . "/geos?access_token=" . $access_token,
                $this->requestConfig,
                json_encode($data)
            );
        }

        try {
            $response = $request->send();
            $geoUrl = explode("/", $response->getLocation());
            if ( ! is_array($geoUrl)) {
                new OrdercloudException(
                    "Geo ID not found in request, response: " . $response, $request->getResponse()->getStatusCode()
                );
            }

            return end($geoUrl);
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Creates an order for the user
     *
     * @param int $userId        - Int the id of the user which the order is for
     * @param array $items         - Array The items for the order
     * @param $paymentStatus - String the payment status UNPAID or PAID
     * @param $deliveryType  - String SELFPICKUP or DELIVERY
     * @param $amount        - Float The total for the order
     * @param $userGeoId     - Int The address for ID for the order
     *
     * @throws OrdercloudException
     *
     * @return null
     */
    public function createOrder($userId, array $items, $paymentStatus, $deliveryType, $amount, $userGeoId = null)
    {
        $data = [
            "userId"        => $userId,
            "items"         => $items,
            "paymentStatus" => $paymentStatus,
            "deliveryType"  => $deliveryType,
            "amount"        => $amount
        ];

        if ($userGeoId != null) {
            $data["userGeo"] = ["id" => $userGeoId];
        }

        $request = $this->client->post(
            "/resource/orders/organisation/" . $this->organisationId,
            $this->requestConfig,
            json_encode($data)
        );
        $request->setAuth($this->username, $this->password);
        try {
            $response = $request->send();
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    public function getOrdersForUser($userId, $auhType = OrdercloudInterface::AUTH_TYPE_BASIC, $access_token = null, $page = 1, $pageSize = 10, array $orderStatuses = [], array $paymentStatuses = [], $sort = 'date+')
    {
        $queryParams = [
            'access_token' => $access_token,
            'page' => $page,
            'pagesize' => $pageSize,
            'orderstatus' => $orderStatuses,
            'paymentstatus' => $paymentStatuses,
            'sort' => $sort,
        ];
        $urlQuery = http_build_query($queryParams);
        $urlQueryNormalised = preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '=', $urlQuery); // Remove array notations eg. "[0]"

        $request = $this->client->get(
            "/resource/orders/user/$userId?$urlQueryNormalised",
            $this->requestConfig
        );

        if ($auhType == OrdercloudInterface::AUTH_TYPE_BASIC) {
            $request->setAuth($this->username, $this->password);
        }

        try {
            return $request->send()->json()["results"];
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets all the menu tags for a certain store
     *
     * @param $selectedStoreId - Int The ID of the stores you want the menu items for
     *
     * @return array of tags
     *
     * @throws OrdercloudException
     */
    public function getMenu($selectedStoreId)
    {
        $request = $this->client->get(
            "/resource/product/tag/organisation/" . $selectedStoreId . "/type/menu",
            $this->requestConfig
        );
        $request->setAuth($this->username, $this->password);
        try {
            return $request->send()->json()["results"];
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Get a new access token from the refresh token
     *
     * @param $refreshToken - String The refresh token which will be used to fetch a new access token
     *
     * @return array $accessToken new access token
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getNewAccessToken($refreshToken)
    {
        $data = [
            "organisation_code"   => "KD",
            "organisation_secret" => $this->clientSecret,
            "grant_type"          => "refresh_token",
            "refresh_token"       => $refreshToken
        ];

        $request = $this->client->post("/resource/token/", $this->requestConfig, json_encode($data));
        $request->setAuth($this->username, $this->password);
        try {
            $accessToken = $request->send()->json();

            return $accessToken;
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets the settings for an organisation
     *
     * @return array - returns the store details
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getSettingsForOrganisation()
    {
        $request = $this->client->get(
            "/resource/organisations/" . $this->organisationId . "/settings",
            $this->requestConfig
        );
        $request->setAuth($this->username, $this->password);
        try {
            $response = $request->send();
            if ($response->getStatusCode() == 200) {
                return $response->json()["results"];
            }
            else {
                new OrdercloudException(
                    "could not retrieve the settings for organisation: $this->organisationId, response: ", $response->json()
                );
            }
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets the settings for an organisation
     *
     * @param paymentGateway  - the payment gateway to use
     * @param amt             - Amount to be charged
     * @param budgetPeriod    - In months, pass 0 months for straight, max of 48 months (4 years)
     * @param cardExpiryMonth - the expiry month
     * @param cardExpiryYear  - the expiry year
     * @param nameOnCard      - the name on the card
     * @param cvv             - cvv number for the credit card
     * @param cardNumber      - the credit card number
     * @param orderRef        - The order ID
     * @param description     - The description for what they will be charged for
     * @param testMode        - Whether test mode is on
     * @param $access_token   - String The access_token to use
     *
     * @return the created payments ID
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
    ) {
        $data = [
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
            $testMode
        ];

        $request = $this->client->post(
            "/resource/order/$orderRef/pay/creditcard/$paymentGateway?access_token=" . $access_token,
            $this->requestConfig,
            json_encode($data)
        );

        try {
            $response = $request->send();
            $paymentId = explode("/", $response->getLocation());
            if ( ! is_array($paymentId)) {
                new OrdercloudException(
                    "Payment ID not found in request, response: " . $response, $request->getResponse()->getStatusCode()
                );
            }

            return end($paymentId);
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Retrieves the profile for the given user id
     *
     * @param int $userId
     *
     * @return array
     */
    public function getProfile($userId)
    {
        $request = $this->client->get(
            "/resource/users/{$userId}/profile",
            $this->requestConfig
        );
        $request->setAuth($this->username, $this->password);
        try {
            return $request->send()->json();
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    public function updateProfile($userId, $firstName, $lastName, $nickName, $email, $cellPhoneNumber, $gender)
    {
        $payload = json_encode([
            'firstName'       => $firstName,
            'surname'         => $lastName,
            'nickName'        => $nickName,
            'email'           => $email,
            'cellphoneNumber' => $cellPhoneNumber,
            'sex'             => $gender,
        ]);
        $request = $this->client->put(
            "/resource/users/{$userId}/profile",
            $this->requestConfig,
            $payload
        );
        $request->setAuth($this->username, $this->password);
        try {
            $request->send();
        }
        catch (BadRequestHttpException $e) {
            Log::error($e);
            Log::error("The request body: " . $payload);
            Log::error("The response body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch (ClientErrorResponseException $e) {
            Log::error($e);
            Log::error("The request body: " . $payload);
            Log::error("The response body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    public function getSettingsForOrganisationByKeyName($key)
    {
        $loweredKey = trim(strtolower($key));
        $settings = $this->getSettingsForOrganisation();

        foreach ($settings as $setting) {
            if ($setting['key']['name'] == $loweredKey) {
                return $setting;
            }
        }

        return null;
    }
}
