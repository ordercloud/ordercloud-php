<?php

use Ordercloud\Requests\Exceptions\OrdercloudRequestException;
use Ordercloud\Requests\Organisations\GetOrganisationRequest;
use Ordercloud\Requests\Products\Criteria\ProductCriteria;
use Ordercloud\Requests\Products\Criteria\ProductTagCriteria;
use Ordercloud\Requests\Products\Criteria\ProductTagTypeCriteria;
use Ordercloud\Requests\Products\Criteria\TagCriteria;
use Ordercloud\Requests\Products\GetOrganisationProductsByTagNamesRequest;
use Ordercloud\Requests\Products\GetProductRequest;
use Ordercloud\Support\OrdercloudBuilder;
use Ordercloud\Support\Reflection\EntityReflector;

include 'vendor/autoload.php';

$oc = OrdercloudBuilder::create()
    //->setBaseUrl('https://staging-api.ordercloud.com')
//    ->setBaseUrl('https://temp-api.ordercloud.com')
    ->setBaseUrl('https://test-api.ordercloud.com')
    ->setOrganisationToken('9cb8c18e17b4fd19e48141ca05e55485')
    //->setOrganisationToken('6f38479dc66ee8baa839a97bd9c4ef6b')
    //->setOrganisationToken('a5d85a55aa3bda7a0aa8b92388e3d3ff')
    ->setUsername('michael@ordercloud.co.za')
    ->setPassword('password')
    // SaleHub
    //->setOrganisationToken('de2b8f75f95804dd648ede354c427724')
    ->getOrdercloud()
;

    // Using services

    try {
        //$tag = $oc->productTags()->getTag(2904);
        //$oc->productTags()->getTagTypes();
        //$tags = $oc->productTags()->getTags(
        //    TagCriteria::create()->setOrganisationId(131)->setTypeId(5)->setPageSize(-1)
        //);
        //$tagId = $oc->productTags()->createTag(131, 1, 'menu-tag');
        //$tag = $oc->productTags()->getTag($tagId);
        //$tagId = $oc->productTags()->createTag(131, 1, 'This is a menu tag');
        //$oc->productTags()->updateTag(2914, 'This is an updated menu tag', 'Here is the short description');
        //$oc->productTags()->disableTag(2914);
        //$oc->productTags()->deleteTag($tagId);
        //$tag = $oc->productTags()->getTag(2915);

        $product = $oc->products()->getProduct(25);
        //$criteria = ProductCriteria::create()
        //    ->setOrganisations([200])
        //    ->setTags([new ProductTagCriteria(null, 'health foods', new ProductTagTypeCriteria(null, 'menu'))]);
        //$products = $oc->products()->getProducts($criteria);
        echo json_encode($product, JSON_PRETTY_PRINT);
        die;

        //$oc->orders()->getOrder(206);
        //echo json_encode($oc->connections()->);die;

        //var_dump(json_encode($tagId));die;
        //die;
    }
    catch (OrdercloudRequestException $e) {
        var_dump([
            'error' => get_class($e),
            'reason' => $e->getMessage(),
            'request' => $e->getHttpException()->getRequest()->getRawRequest(),
            'response' => $e->getHttpException()->getResponse()->getRawResponse()
        ]);
        die;
    }
die;




    //$connections = $oc->organisations()->getMarketplaceConnections();
    //
    //$criteria = ProductCriteria::create()
    //    ->setOrganisations([128, 122])
    //    ->setShowDisabled(true)
    //    ->setTags([
    //        new ProductTagCriteria(2728, null, new ProductTagTypeCriteria(null, 'products')),
    //        new ProductTagCriteria(2729, null, new ProductTagTypeCriteria(null, 'products')),
    //        new ProductTagCriteria(2730, null, new ProductTagTypeCriteria(null, 'products')),
    //        new ProductTagCriteria(2731, null, new ProductTagTypeCriteria(null, 'products')),
    //    ]);
    //$products = $oc->products()->getProducts($criteria);



//$oc->setOrganisationToken(new \Ordercloud\Entities\Organisations\OrganisationAccessToken('123', 0, 0, true));
//$oc->setAccessToken('2053ae7e75b899dcc627cee38a2b6a30');

//echo "Ordercloud initialised\n";

// Base
//$request = new OrdercloudRequest('GET', '/resource/organisations/3');

// Organisations
//$request = new GetOrganisationAccessTokenRequest(3);
//$request = new GetOrganisationAccessTokenRequest(3, Authorisation::createWithUsernamePassword('admin@kingdelivery.co.za', 'password'));
//$request = new GetOrganisationRequest(3);
//$request = new CreateOrganisationAddressRequest(3);

// Connections
//$request = new GetMarketplaceConnectionsRequest(3);
//$request = new GetConnectionsByTypeRequest(ConnectionType::CHILD, 3);
//$request = new GetConnectionsByTypeRequest(ConnectionType::MARKETPLACE);

// Products
//$request = new GetOrganisationProductsByTagNamesRequest([12], [ 'chicken' ], $page = 1, $pageSize = 2);
//$request = new GetProductRequest(177);
//$request = new GetProductTagsForOrganisationByTypeNameRequest(13, 'menu');

// Users
//$request = new GetLoggedInUserRequest();
//$request = new GetLoggedInUserRequest(Authorisation::createWithAccessToken('cd09fdb823b64e2b62af4bbc958e74c6'));
//$request = new GetLoggedInUserRequest(Authorisation::createWithUsernamePassword('michael@ordercloud.co.za', 'Me1301Li#Ord'));
//$request = new \Ordercloud\Requests\Users\GetUserAddressesRequest(55);
//$request = new \Ordercloud\Requests\Users\CreateUserAddressRequest(55, new \Ordercloud\Requests\Users\Entities\NewUserAddress('Test sdk', 4, 'Woolf', null, 'Kenridge', 'Durbanville', 7550, 'Phone when outside', '-33.866282', '18.634969'));
//$request = new \Ordercloud\Requests\Users\GetUserByIdRequest(55);
//$request = new \Ordercloud\Requests\Users\GetUserProfileRequest(55);
//$request = new \Ordercloud\Requests\Users\UpdateUserProfileRequest(55, new \Ordercloud\Entities\Users\UserProfile('Michael', 'Nel', 'michael@ordercloud.co.za', 'mnel', '+27825715207', \Ordercloud\Entities\Users\UserProfile::GENDER_MALE));
//$request = new \Ordercloud\Requests\Users\GetUserByAccessTokenRequest('3c73b152c75237fa1d99c38ef6bb097b');
//$request = new DisableUserAddressRequest(69);
//$request = new UpdateUserAddressRequest(
//    new UserAddress(
//        $id = 1616,
//        $note = 'This note should be saved',
//        $longitude = '30.3724568',
//        $latitude = '-29.5758158',
//        $name = 'Chasedene - Pietermaritzburg',
//        $streetNumber = 47,
//        $streetName = 'Chasedene Rd',
//        $complex = '',
//        $suburb = 'Chasedene',
//        $city = 'Pietermaritzburg',
//        $postalCode = 3201
//    )
//);

// Orders
//$request = new \Ordercloud\Requests\Orders\GetOrderRequest(198);
//$request = new \Ordercloud\Requests\Orders\GetUserOrdersRequest(55);
//$request = \Ordercloud\Requests\Orders\Builders\CreateOrderRequestBuilder::create()
//    ->setOrganisationId(3) // KD HQ
//    ->setDeliveryServiceId(71) // KD PMB
//    ->setOrderSourceChannelId(1)
//    ->setAmount(91.94)
//    ->setDeliveryAddressId(1678)
//    ->setDeliveryType(\Ordercloud\Entities\Orders\Order::DELIVERY_TYPE_DELIVERY)
//    ->setDeliveryCost(32.04)
//    ->setUserId(79)
//    ->setItems([
//        new \Ordercloud\Requests\Orders\Entities\NewOrderItem(
//            $productID = 74,
//            $price = 59.9,
//            $quantity = 1,
//            $note = null,
//            $options = [],
//            $extras = []
//        )
//    ])
//    ->getRequest();

//$request = new \Ordercloud\Requests\Organisations\GetSettingsByOrganisationRequest(3);

// Auth
//$request = new GetLoginUrlRequest(3, 'WdegFJ5Vm', 'https://example.com/login');
//$request = new GetRegisterUrlRequest(3, 'WdegFJ5Vm', 'https://example.com/login');
//$request = \Ordercloud\Requests\Auth\GetUrlRequest::forRegister(3, 'WdegFJ5Vm', 'https://example.com/register');
//$request = new \Ordercloud\Requests\Auth\RefreshAccessTokenRequest('KD', 'WdegFJ5Vm', '0022b175eef06194bcd5301363c97d3f');

//$request = new \Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest(
//    $gateway = \Ordercloud\Entities\Payments\Payment::PAYMENT_GATEWAY_PAYU_ZA,
//    $amount = 60,
//    $card = new \Ordercloud\Requests\Payments\Entities\CreditCard(
//        $cardNumber = '4000015372250142',
//        $nameOnCard = 'mnel',
//        $expiryMonth = '01',
//        $expiryYear = '2020',
//        $cvv = '123'
//    ),
//    $orderID = 257,
//    $budgetPeriod = 0
//);

try {
    echo get_class($request) . "\n";
    $startTime = microtime(true);
    $response = $oc->exec($request);
    //$response = new \Ordercloud\Support\Http\Response(null, null, null, null, null, null);
    echo sprintf("Success! duration: %s seconds\n", bcsub(microtime(true), $startTime, 8));
    var_dump($response);
//        var_dump($response->getItems()[0]->getDetail()->getMerchant());
//        var_dump(get_class($response));
    //    var_dump(serialize($response[0]));
    //    var_dump($response->getRequest()->getHeaders());
}
catch (OrdercloudRequestException $e) {
    var_dump([
        'error' => get_class($e),
        'reason' => $e->getMessage(),
        'request' => $e->getHttpException()->getRequest()->getRawRequest(),
        'response' => $e->getHttpException()->getResponse()->getRawResponse()
    ]);
}
catch (\Ordercloud\Requests\Exceptions\ResponseParseException $e) {

    try {
        throw $e->getParseException()->getPrevious();
    }
    catch (\Ordercloud\Support\Reflection\Exceptions\ArgumentNotProvidedException $ex) {
        var_dump([
            'Error' => 'ArgumentNotProvidedException',
            'ClassName' => $ex->getClassName(),
            'Param' => $ex->getParameterName(),
            'Args' => array_keys($ex->getArguments()),
//            'response' => $e->getResponse()->getData()
        ]);
    }
    catch (\Exception $e) {
        echo get_class($e);
    }
}
