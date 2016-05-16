<?php

include 'service-tests.php';

/** Users */
$userService = OC::getUserService($container);

try {
    var_dump(
//        $userService->findUser('michael@ordercloud.co.za')
        OC::getAuthService($container)->getLoginUrl(3, 'WdegFJ5Vm', 'https://example.com/login')
    );
    echo 'awe';
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
