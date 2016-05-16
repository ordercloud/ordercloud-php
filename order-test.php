<?php

use Ordercloud\Entities\Orders\Order;
use Ordercloud\Entities\Payments\PaymentStatus;
use Ordercloud\Requests\Orders\Builders\CreateOrderRequestBuilder;
use Ordercloud\Requests\Orders\Entities\NewOrderItem;
use Ordercloud\Requests\Orders\Entities\NewOrderItemOption;
use Ordercloud\Requests\Orders\EstimateDeliveryCostRequest;
use Ordercloud\Support\OrdercloudBuilder;

include 'vendor/autoload.php';



$oc = OrdercloudBuilder::create()
//        ->setBaseUrl('https://staging-api.ordercloud.com')
//        ->setOrganisationToken('9cb8c18e17b4fd19e48141ca05e55485')
        ->setBaseUrl('https://test-api.ordercloud.com')
        ->setOrganisationToken('55404350e355e8f7e3b252c007e35298')
        ->setUsername('admin@kingdelivery.co.za')
        ->setPassword('password')
        ->getOrdercloud()
;


$deliveryEstimate = $oc->exec(
    new EstimateDeliveryCostRequest(3, 90, [44])
);


$request = CreateOrderRequestBuilder::create()
    ->setAmount(bcadd(79.9, $deliveryEstimate, 2))
    ->setDeliveryAddressId(90)
    ->setDeliveryServiceId(43) // KD PMB
    ->setDeliveryType(Order::DELIVERY_TYPE_DELIVERY)
    ->setOrderSourceChannelId(1)
    ->setOrganisationId(3) // KD HQ
    ->setPaymentStatus(PaymentStatus::UNPAID)
    ->setUserId(57)
    ->setItems([
        new NewOrderItem(
            $productID = 87,
            $price = 79.9,
            $quantity = 1,
            $note = null,
            $options = [],
            $extras = []
        )
    ])
    ->getRequest();

try {
    $orderId = $oc->exec($request);
}
catch (\Ordercloud\Requests\Exceptions\OrdercloudRequestException $e) {
    var_dump([
        'error' => get_class($e),
        'reason' => $e->getMessage(),
        'request' => $e->getHttpException()->getRequest()->getRawRequest(),
        'response' => $e->getHttpException()->getResponse()->getRawResponse()
    ]);
}

var_dump(compact('orderId'));
