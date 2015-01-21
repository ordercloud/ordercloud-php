<?php
namespace Ordercloud\Ordercloud;
use Guzzle\Http\Client;
use Config;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Log;

class Ordercloud implements OrdercloudInterface
{
    const DELIVERY_TYPE_DELIVERY = "DELIVERY";
    const DELIVERY_TYPE_SELFPICKUP = "SELFPICKUP";

    const PAYMENT_STATUS_PAID = "PAID";
    const PAYMENT_STATUS_UNPAID = "UNPAID";

    const AUTH_TYPE_TOKEN = "token";
    const AUTH_TYPE_BASIC = "basic";

    private $client = null;
    private $username = null;
    private $password = null;
    private $organisationId = null;
    private $clientSecret = null;

    private $requestConfig = array(
        "Content-type" => "application/json",
        'allow_redirects' => false
    );

    /**
     * The constructor for the Ordercloud class, creates an http client from configured paramerters
     *
     * @param $config - Pass an array to load your own config or config/Ordercloud.php will be used
     *
     */
    public function __construct($config = false)
    {
        if($config === false)
        {
            $this->client = new Client(Config::get('Ordercloud.base_url'));
            $this->client->setDefaultOption('verify', Config::get("Ordercloud.verify_ssl"));
            $this->username = Config::get("Ordercloud.username");
            $this->password = Config::get("Ordercloud.password");
            $this->clientSecret = Config::get("Ordercloud.client_secret");
            $this->organisationId = Config::get("Ordercloud.organisation_id");
        }
        else
        {
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
        $request = $this->client->get("/resource/organisations/$marketPlaceId/connections/type/M", $this->requestConfig);
        $request->setAuth($this->username, $this->password);
        try
        {
            return $request->send()->json()["results"];
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
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
        try
        {
            $response = $request->send();
            if($response->getStatusCode() == 200)
            {
                return $response->json();
            }
            else
            {
                new OrdercloudException("could not retrieve store for ID: $storeId, response: ", $response->json());
            }

        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
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
        $request = $this->client->get("/resource/organisations/" . $this->organisationId . "/connections/type/CH", $this->requestConfig);
        $request->setAuth($this->username, $this->password);
        try
        {
            return $request->send()->json()["results"];


        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets all products for a market place
     *
     * @param $marketPlaceId - Id of the market place which products are requested for
     * @param $category The categories to search in
     * @param $auhType = SELF::AUTH_TYPE_BASIC The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return array - Products for market place
     */
    public function getProductsByMarketPlace($marketPlaceId, $category, $auhType = SELF::AUTH_TYPE_BASIC, $access_token = null)
    {
        $body = array(
            "tags" => array($category),
            "organisations" => array($marketPlaceId),
        );

        if($auhType == SELF::AUTH_TYPE_BASIC)
        {
            $request = $this->client->put("/resource/product/criteria", $this->requestConfig, json_encode($body));
            $request->setAuth($this->username, $this->password);
        }
        else
        {
            $request = $this->client->put("/resource/product/criteria?access_token=" . $access_token, $this->requestConfig, json_encode($body));
        }

        try
        {
            return $request->send()->json()["results"];
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets the products
     *
     * @param $productId - The id of the product
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return array - the product
     *
     * @throws OrdercloudException ClientErrorResponseException
     *
     */
    public function getProduct($productId, $auhType = SELF::AUTH_TYPE_BASIC, $access_token = null)
    {
        if($auhType == SELF::AUTH_TYPE_BASIC)
        {
            $request = $this->client->get("/resource/product/$productId", $this->requestConfig);
            $request->setAuth($this->username, $this->password);
        }
        else
        {
            $request = $this->client->get("/resource/product/$productId?access_token=" . $access_token, $this->requestConfig);
        }

        try
        {
            return $request->send()->json();
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Gets the URL for the user to be directed with OAuth
     *
     * @param $redirectUrl - The url which the OAuth returns the user to
     * @param $login - true for login page, false for register page
     * @param $mobile - True for mobile false for desktop
     * @param $clientSecret - THe client secret
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
        $data = array(
            "organisation_id" => $organisationId,
            "client_secret" => $clientSecret,
            "redirect_url" =>  $redirectUrl,
            "mobile" => $mobile,
            $login => $login
        );

        $request = $this->client->post("/faces/credential", array("Content-type" => "application/x-www-form-urlencoded", 'allow_redirects' => false), $data);
        $request->setAuth($this->username, $this->password);

        try
        {
            $response = $request->send();
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
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

        try
        {
            return $request->send()->json();
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Get the users addressese
     *
     * @param $userId - The ID of the user
     * @param $auhType The type of auth to use
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return array - user addresses
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getUserAddresses($userId,  $auhType = SELF::AUTH_TYPE_BASIC, $access_token = null)
    {
        if($auhType == SELF::AUTH_TYPE_BASIC)
        {
            $request = $this->client->get("/resource/users/" . $userId . "/geos", $this->requestConfig);
            $request->setAuth($this->username, $this->password);
        }
        else
        {
            $request = $this->client->get("/resource/users/" . $userId . "/geos?access_token=" . $access_token, $this->requestConfig);
        }

        try
        {
            return $request->send()->json()["results"];
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Creates an address for the user
     *
     * @param $userId - The ID of the user the adddress is to be created for
     * @param $name - The name for the address
     * @param $streetName - The street name
     * @param $city - The city
     * @param $addressDetails - Other details which are not required (streetNumber, complex, suburb, postalCode, note, longitude, latitude)
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     * @return the id of the created address
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function createAddressForUser($userId, $name, $streetName, $city, $addressDetails = array(),  $auhType = SELF::AUTH_TYPE_BASIC, $access_token = null)
    {
       $data = array(
           "name" => $name,
           "streetName" => $streetName,
           "city" => $city
       );

        $data += $addressDetails;

        if($auhType == SELF::AUTH_TYPE_BASIC)
        {
            $request = $this->client->post("/resource/users/" . $userId . "/geos", $this->requestConfig, json_encode($data));
            $request->setAuth($this->username, $this->password);
        }
        else
        {
            $request = $this->client->post("/resource/users/" . $userId . "/geos?access_token=" . $access_token, $this->requestConfig, json_encode($data));
        }

        try
        {
            $response = $request->send();
            $geoUrl = explode("/", $response->getLocation());
            if(!is_array($geoUrl))
            {
                new OrdercloudException("Geo ID not found in request, response: " . $response, $request->getResponse()->getStatusCode());
            }
            return end($geoUrl);
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

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
     * @throws OrdsercloudException
     *
     * @return null
     */
    public function createOrder($userId, $items, $paymentStatus, $deliveryType, $amount, $userGeoId = NULL)
    {
        $data = array(
            "userId" => $userId,
            "items" => $items,
            "paymentStatus" => $paymentStatus,
            "deliveryType" => $deliveryType,
            "amount" => $amount
        );

        if($userGeoId != null)
        {
            $data["userGeo"] = array("id" => $userGeoId);
        }


        $request = $this->client->post("/resource/orders/organisation/" . $this->organisationId, $this->requestConfig, json_encode($data));
        $request->setAuth($this->username, $this->password);
        try
        {
            $response = $request->send();
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * gets all the orders for a user
     *
     * @param $userId the users id
     * @param $auhType The type of auth to use
     * @param $access_token The access_token to use
     *
     * @return array the order for the user
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getOrderForUser($userId, $auhType = SELF::AUTH_TYPE_BASIC, $access_token = null)
    {
        if($auhType == SELF::AUTH_TYPE_BASIC)
        {
            $request = $this->client->get("/resource/orders/user/" . $userId, $this->requestConfig);
            $request->setAuth($this->username, $this->password);
        }
        else{
            $request = $this->client->get("/resource/orders/user/" . $userId . "?access_token=" . $access_token, $this->requestConfig);
        }

        try
        {
            return $request->send()->json()["results"];
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * gets all the menu tags for a certain store
     *
     * $param $selectedStoreId - The ID of the stores you want the menu items for
     *
     * @return array of tags
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getMenu($selectedStoreId)
    {
        $request = $this->client->get("/resource/product/tag/organisation/" . $selectedStoreId . "/type/menu", $this->requestConfig);
        $request->setAuth($this->username, $this->password);
        try
        {
            return $request->send()->json()["results"];
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }

    /**
     * Get a new access token from the refresh token
     *
     * @param $refreshToken - The refresh token which will be used to fetch a new access token
     *
     * @return array $accessToken new access token
     *
     * @throws OrdercloudException ClientErrorResponseException
     */
    public function getNewAccessToken($refreshToken)
    {
        $data = array(
            "organisation_code" => "KD",
            "organisation_secret" => $this->clientSecret,
            "grant_type" => "refresh_token",
            "refresh_token" => $refreshToken
        );

        $request = $this->client->post("/resource/token/", $this->requestConfig, json_encode($data));
        $request->setAuth($this->username, $this->password);
        try
        {
            $accessToken = $request->send()->json();
            return $accessToken;
        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
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
        $request = $this->client->get("/resource/organisations/" . $this->organisationId . "/settings", $this->requestConfig);
        $request->setAuth($this->username, $this->password);
        try
        {
            $response = $request->send();
            if($response->getStatusCode() == 200)
            {
                return $response->json()["results"];
            }
            else
            {
                new OrdercloudException("could not retrieve the settings for organisation: $this->organisationId, response: ", $response->json());
            }

        }
        catch(BadRequestHttpException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
        catch(ClientErrorResponseException $e)
        {
            Log::error($e);
            Log::error("The Body: " . $request->getResponse());
            new OrdercloudException($e->getMessage(), $request->getResponse()->getStatusCode(), $e);
        }
    }
}