<?php

include 'vendor/autoload.php';

use Illuminate\Container\Container;
use Ordercloud\Requests\Products\Criteria\ProductCriteria;
use Ordercloud\Requests\Products\Criteria\ProductTagCriteria;
use Ordercloud\Requests\Products\Criteria\ProductTagTypeCriteria;
use Ordercloud\Services\OrganisationService;
use Ordercloud\Services\ProductService;
use Ordercloud\Support\OrdercloudBuilder;

$container = new Container();
$oc = OrdercloudBuilder::create()
    //->setBaseUrl('http://staging-api.ordercloud.com')
    ->setBaseUrl('https://test-api.ordercloud.com')
//    ->setBaseUrl('https://temp-api.ordercloud.com')
    ->setOrganisationToken('9cb8c18e17b4fd19e48141ca05e55485')
    //->setUsername('admin@kingdelivery.co.za')
    //->setPassword('password')
    ->setContainer($container)
    ->getOrdercloud()
;

class OC {
    private static $oc;

    /**
     * @param mixed $oc
     */
    public static function setOc($oc)
    {
        self::$oc = $oc;
    }

    /**
     * @param $container
     *
     * @return OrganisationService
     */
    public static function getOrganisationService($container)
    {
        return $container->make('Ordercloud\Services\OrganisationService');
    }
    /**
     * @param $container
     *
     * @return ProductService
     */
    public static function getProductService($container)
    {
        return $container->make('Ordercloud\Services\ProductService');
    }
    /**
     * @param $container
     *
     * @return \Ordercloud\Services\UserService
     */
    public static function getUserService($container)
    {
        return $container->make('Ordercloud\Services\UserService');
    }
    /**
     * @param $container
     *
     * @return \Ordercloud\Services\AuthService
     */
    public static function getAuthService($container)
    {
        return $container->make('Ordercloud\Services\AuthService');
    }
    /**
     * @param $container
     *
     * @return \Ordercloud\Services\PaymentService
     */
    public static function getPaymentService($container)
    {
        return $container->make('Ordercloud\Services\PaymentService');
    }
    /**
     * @param $container
     *
     * @return \Ordercloud\Services\OrderService
     */
    public static function getOrderService($container)
    {
        return $container->make('Ordercloud\Services\OrderService');
    }
}
OC::setOc($oc);

/** Orgs */
//$orgService = OC::getOrganisationService($container);
$prodService = OC::getProductService($container);
//$payService = OC::getPaymentService($container);
//$orderService = OC::getOrderService($container);

//$criteria = AdvancedConnectionCriteria::create()
//    ->setIndustries([OrganisationIndustry::FURNITURE])
//    ->setPageSize(2)
//    ->setType(ConnectionType::MARKETPLACE)
//    ->setStatuses([Connection::STATUS_CONNECTED])
//;

//$connections = $orgService->getConnections(71, $criteria);
//$connections = $orgService->getConnections(71);
$criteria = ProductCriteria::create()
    ->setOrganisations([90])
    ->setTags([
        new ProductTagCriteria(1691),
        new ProductTagCriteria(null, 'sides'),
        new ProductTagCriteria(null, 'salads', ProductTagTypeCriteria::create()->setName('menu')),
        new ProductTagCriteria(null, 'salads', ProductTagTypeCriteria::create()->setId(5)),
    ]);

try {
    echo json_encode($prodService->getProducts($criteria));
    //var_dump([
    //    'dump' => $prodService->getProducts($criteria)
    //    //'dump' => $orgService->getOrganisation(96)
    //]);
}
catch (\Ordercloud\Requests\Exceptions\OrdercloudRequestException $e) {
    var_dump([
        'class' => get_class($e),
        'message' => $e->getMessage(),
        'req' => $e->getHttpException()->getRequest()->getRawRequest(),
        'res' => $e->getHttpException()->getResponse()->getRawResponse()
    ]);
}
