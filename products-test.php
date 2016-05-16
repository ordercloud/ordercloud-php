<?php

use Ordercloud\Requests\Products\Criteria\ProductCriteria;

include 'service-tests.php';

/** Products */
$productService = OC::getProductService($container);

$criteria = ProductCriteria::create()
   ->setOrganisations([88])
   ->setTags(['Crisp salads & hot veg'])
;

try {
    $products = $productService->getProducts($criteria);
}
catch (\Ordercloud\Requests\Exceptions\OrdercloudRequestException $e) {
    var_dump([
        'error' => get_class($e),
        'reason' => $e->getMessage(),
        'request' => $e->getHttpException()->getRequest()->getRawRequest(),
        'response' => $e->getHttpException()->getResponse()->getRawResponse()
    ]);
}
catch (\Ordercloud\Support\Reflection\Exceptions\ArgumentNotProvidedException $e) {
    var_dump([
        'Error' => 'ArgumentNotProvidedException',
        'ClassName' => $e->getClassName(),
        'Param' => $e->getParameterName(),
        'Args' => array_keys($e->getArguments()),
    ]);
}

var_dump(
    count($products)
);
