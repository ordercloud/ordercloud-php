<?php namespace spec\Ordercloud\Support;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Ordercloud\Support\Parser');
    }

    function it_can_parse_a_short_organisation()
    {
        $organisationData = [
            'id'   => 1,
            'name' => 'Testing',
            'code' => 'TST'
        ];

        $this->parseOrganisationShort($organisationData)->shouldReturnAnInstanceOf('Ordercloud\Entities\Organisations\OrganisationShort');
    }

    function it_can_parse_a_user_role()
    {
        $userRole = [
            "id"          => 1,
            "name"        => "test",
            "description" => "test description"
        ];

        $this->parseUserRoles([$userRole, $userRole, $userRole])->shouldBeArray();
    }

    function it_can_parse_setting()
    {
        $settingKey["id"] = 1;
        $settingKey["name"] = "test";

        $setting = [
            'id'           => 1,
            'value'        => "testy",
            "key"          => $settingKey,
            'startDate'    => "test",
            'endDate'      => "test",
            'dateCreated'  => "test",
            'lastUpdated'  => "test",
            "organisation" => [
                'id'   => 1,
                'name' => 'Testing',
                'code' => 'TST'
            ]
        ];
        $this->parseSetting($setting)->shouldReturnAnInstanceOf('Ordercloud\Entities\Settings\Setting');
    }

    function it_can_parse_a_order_status()
    {
        $orderStatus = [
            'id'          => 1,
            'name'        => 'Testing',
            'description' => 'TST'
        ];

        $this->parseOrderStatus($orderStatus)->shouldReturnAnInstanceOf('Ordercloud\Entities\Orders\OrderStatus');
    }

    function it_can_parse_a_user_profile()
    {
        $userProfile['firstName'] = "test";
        $userProfile['surname'] = "test";
        $userProfile['email'] = "test@test.com";
        $userProfile['nickName'] = "test";
        $userProfile['cellphoneNumber'] = "0848300757";
        $userProfile['sex'] = "M";

        $this->parseUserProfile($userProfile)->shouldReturnAnInstanceOf('Ordercloud\Entities\Users\UserProfile');
    }

    function it_can_parse_a_user_short()
    {
        $userProfile['firstName'] = "test";
        $userProfile['surname'] = "test";
        $userProfile['email'] = "test@test.com";
        $userProfile['nickName'] = "test";
        $userProfile['cellphoneNumber'] = "0848300757";
        $userProfile['sex'] = "M";

        $user = [
            "id"       => 1,
            "username" => "test@test.com",
            "profile"  => $userProfile
        ];

        $this->parseUserShort($user)->shouldReturnAnInstanceOf('Ordercloud\Entities\Users\UserShort');
    }

    function it_can_parse_a_product_discount_price()
    {
        $productPriceDiscount['discountAmount'] = "1";
        $productPriceDiscount['discountPrice'] = "1";

        $this->parseProductPriceDiscount($productPriceDiscount)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductPriceDiscount');
    }

    function it_can_parse_a_user_address()
    {
        $userAddress['id'] = "test";
        $userAddress['name'] = "test";
        $userAddress['streetNumber'] = "test";
        $userAddress['streetName'] = "test";
        $userAddress['complex'] = "test";
        $userAddress['suburb'] = "test";
        $userAddress['city'] = "test";
        $userAddress['postalCode'] = "test";
        $userAddress['note'] = "test";
        $userAddress['latitude'] = "test";
        $userAddress['longitude'] = "test";

        $this->parseUserAddress($userAddress)->shouldReturnAnInstanceOf('Ordercloud\Entities\Users\UserAddress');
    }

    function it_can_parse_a_payment_status()
    {
        $paymentStatus['status'] = "test";
        $paymentStatus['when'] = "test";
        $paymentStatus['message'] = "test";
        $this->parsePaymentStatus($paymentStatus)->shouldReturnAnInstanceOf('Ordercloud\Entities\Payments\PaymentStatus');
    }

    function it_can_parse_product_extra_display()
    {
        $productExtraDisplay['id'] = "test";
        $productExtraDisplay['name'] = "test";
        $productExtraDisplay['description'] = "test";
        $productExtraDisplay['price'] = "test";
        $productExtraDisplay['tags'][] = [
            'id'               => 1,
            'name'             => "test",
            'description'      => "test",
            'shortDescription' => "test",
            'enabled'          => "test",
            'childTags'        => [],
            'tagType'          => [
                'id'          => "test",
                'description' => "test",
                'name'        => "test",
                'dateCreated' => "test",
                'lastUpdated' => "test"
            ],
            'organisation'     => [
                'id'   => "test",
                'name' => "test",
                'code' => "test"
            ],
            'parentTag'        => [
                'id'   => 'test',
                'name' => 'test'
            ]
        ];

        $this->parseProductExtraDisplay($productExtraDisplay)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductExtraDisplay');
    }

    function it_can_parse_product_option_display()
    {
        $productOptionDisplay['id'] = "test";
        $productOptionDisplay['name'] = "test";
        $productOptionDisplay['description'] = "test";
        $productOptionDisplay['price'] = "test";
        $productOptionDisplay['tags'][] = [
            'id'               => 1,
            'name'             => "test",
            'description'      => "test",
            'shortDescription' => "test",
            'enabled'          => "test",
            'childTags'        => [],
            'tagType'          => [
                'id'          => "test",
                'description' => "test",
                'name'        => "test",
                'dateCreated' => "test",
                'lastUpdated' => "test"
            ],
            'organisation'     => [
                'id'   => "test",
                'name' => "test",
                'code' => "test"
            ],
            'parentTag'        => [
                'id'   => 'test',
                'name' => 'test'
            ]
        ];

        $this->parseProductExtraDisplay($productOptionDisplay)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductExtraDisplay');
    }

    function it_can_parse_a_delivery_agent()
    {
        $deliveryAgent = [
            'id'           => "test",
            'user'  => [
                'id' => 1,
                'username' => 'test',
                'profile' => [
                    'firstName'       => 'test',
                    'surname'         => 'test',
                    'email'           => 'test',
                    'nickName'        => 'test',
                    'cellphoneNumber' => 'test',
                    'sex'             => 'test',
                ],
            ],
            'organisation' => [
                'id'   => "TEST",
                'name' => "TEST",
                'code' => "TEST"
            ],
            'minBalance'   => "test",
            'maxBalance'   => "test",
            'enabled'      => "test",
            'status'       => [
                'id'     => "TEST",
                'status' => "TEST"
            ],
            'accountNo'    => "test",
            'cardNo'       => "test"
        ];
        $this->parseDeliveryAgent($deliveryAgent)->shouldReturnAnInstanceOf('Ordercloud\Entities\Delivery\DeliveryAgent');
    }

    function it_can_parse_a_delivery_agent_status()
    {
        $deliveryAgentStatus = [
            'id'     => "test",
            'status' => "test"
        ];
        $this->parseDeliveryAgentStatus($deliveryAgentStatus)->shouldReturnAnInstanceOf('Ordercloud\Entities\Delivery\DeliveryAgentStatus');
    }

    function it_can_parse_a_product_tag()
    {
        $productTag = [
            'id'               => "test",
            'name'             => "test",
            'description'      => "test",
            'shortDescription' => "test",
            'enabled'          => "test",
            'tagType'          => [
                'id'          => "test",
                'description' => "test",
                'name'        => "test",
                'dateCreated' => "test",
                'lastUpdated' => "test"
            ],
            'organisation'     => [
                "id"   => "test",
                "name" => "test",
                "code" => "test"
            ],
            'parentTag'        => [
                "id"   => "test",
                "name" => "test"
            ],
            "childTags"        => []
        ];

        $this->parseProductTag($productTag)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductTag');
    }

    function it_can_parse_display_user()
    {
        $displayUser = [
            "id"       => "test",
            "username" => "test"
        ];
        $this->parseDisplayUser($displayUser)->shouldReturnAnInstanceOf('Ordercloud\Entities\Users\DisplayUser');
    }

    function it_can_parse_a_product_tag_type()
    {
        $productTagType = [
            'id'          => "test",
            'description' => "test",
            'name'        => "test",
            'dateCreated' => "test",
            'lastUpdated' => "test"
        ];
        $this->parseProductTagType($productTagType)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductTagType');
    }

    function it_can_parse_product_tag_types()
    {
        $productTagType = [
            'id'          => "test",
            'description' => "test",
            'name'        => "test",
            'dateCreated' => "test",
            'lastUpdated' => "test"
        ];
        $this->parseProductTagTypes([$productTagType, $productTagType, $productTagType])->shouldBeArray();
    }

    function it_can_parse_product_tag_link()
    {
        $productTagLink = [
            "id"   => "test",
            "name" => "test"
        ];
        $this->parseProductTagLink($productTagLink)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductTagLink');
    }

    function it_can_parse_product_type()
    {
        $productType = [
            'id'          => "test",
            'name'        => "test",
            'description' => "test"
        ];
        $this->parseProductType($productType)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductType');
    }

    function it_can_parse_a_connection()
    {
        $connectionType = [
            "id" => "test",
            "name" => "test",
            "code" => "test"
        ];

        $feeType = [
            'id' => "test",
            'code' => "test",
            'name' => "test",
            'description' => "test"
        ];

        $feeMetric = [
            'id' => "Test",
            'code' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $feeStructure = [
            'id' => "test",
            'code' => "test",
            'name' => "test",
            'description' => "test",
            'rule' => "test",
            'rule_name' => "test",
            'percentage' => "test",
            'flatfee' => "test",
            'volume' => "test"
        ];

        $feeDetail = [
            "id"  => "test",
            "minValue" => "test",
            "maxValue" => "test",
            "fixedAmount" => "test",
            "percentageAmount" => "test",
            "volumeAmount" => "test",
            "enabled" => "test"
        ];

        $fee = [
            'id' => "test",
            'startDate' => "test",
            'endDate' => "test",
            'enabled' => "test",
            'lastUpdated' => "test",
            'details' => [$feeDetail, $feeDetail, $feeDetail],
            'type' => $feeType,
            'metric' => $feeMetric,
            'structure' => $feeStructure
        ];

        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "types" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];

        $fees = [$fee, $fee, $fee];

        $connection = [
            "id" => "test",
            "toOrganisation",
            "fromOrganisation",
            "ended" => "test",
            'enabled' => "test",
            'status' => "test",
            'settlementInterval' => "test",
            'type' => $connectionType,
            "fee" => $fees,
            "fromOrganisation" => $organisation,
            "toOrganisation" => $organisation
        ];
        $this->parseConnection($connection)->shouldReturnAnInstanceOf('Ordercloud\Entities\Connections\Connection');
    }

    function it_can_parse_a_connection_fee_detail ()
    {
        $feeDetail = [
            "id" => "Test",
            "minValue" => "test",
            "maxValue" => "test",
            "fixedAmount" => "test",
            "percentageAmount" => "test",
            "volumeAmount" => "test",
            "enabled" => "test"
        ];
        $this->parseConnectionFeeDetail($feeDetail)->shouldReturnAnInstanceOf('Ordercloud\Entities\Connections\ConnectionFeeDetail');
    }

    public function it_can_parse_connection_fee_details ()
    {
        $feeDetail = [
            "id" => "Test",
            "minValue" => "test",
            "maxValue" => "test",
            "fixedAmount" => "test",
            "percentageAmount" => "test",
            "volumeAmount" => "test",
            "enabled" => "test"
        ];
        $this->parseConnectionFeeDetails([$feeDetail, $feeDetail, $feeDetail])->shouldBeArray();
    }

    public function it_can_parse_organisation_status ()
    {
        $organisationStatus = [
            "id" => "test",
            "name" => "test",
            "description" => "test"
        ];

        $this->parseOrganisationStatus($organisationStatus)->shouldReturnAnInstanceOf('Ordercloud\Entities\Organisations\OrganisationStatus');
    }

    function it_can_parse_organisations ()
    {
        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "types" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];
        $this->parseOrganisations([$organisation, $organisation, $organisation])->shouldBeArray();
    }

    function it_can_parse_an_organisation ()
    {
        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "types" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];
        $this->parseOrganisation($organisation)->shouldReturnAnInstanceOf('Ordercloud\Entities\Organisations\Organisation');
    }

    function it_can_parse_connections ()
    {
        $connectionType = [
            "id" => "test",
            "name" => "test",
            "code" => "test"
        ];

        $feeType = [
            'id' => "test",
            'code' => "test",
            'name' => "test",
            'description' => "test"
        ];

        $feeMetric = [
            'id' => "Test",
            'code' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $feeStructure = [
            'id' => "test",
            'code' => "test",
            'name' => "test",
            'description' => "test",
            'rule' => "test",
            'rule_name' => "test",
            'percentage' => "test",
            'flatfee' => "test",
            'volume' => "test"
        ];

        $feeDetail = [
            "id"  => "test",
            "minValue" => "test",
            "maxValue" => "test",
            "fixedAmount" => "test",
            "percentageAmount" => "test",
            "volumeAmount" => "test",
            "enabled" => "test"
        ];

        $fee = [
            'id' => "test",
            'startDate' => "test",
            'endDate' => "test",
            'enabled' => "test",
            'lastUpdated' => "test",
            'details' => [$feeDetail, $feeDetail, $feeDetail],
            'type' => $feeType,
            'metric' => $feeMetric,
            'structure' => $feeStructure
        ];

        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "types" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];

        $fees = [$fee, $fee, $fee];

        $connection = [
            "id" => "test",
            "toOrganisation",
            "fromOrganisation",
            "ended" => "test",
            'enabled' => "test",
            'status' => "test",
            'settlementInterval' => "test",
            'type' => $connectionType,
            "fee" => $fees,
            "fromOrganisation" => $organisation,
            "toOrganisation" => $organisation
        ];

        $this->parseConnections([$connection, $connection, $connection])->shouldBeArray();
    }

    function it_can_parse_user_roles ()
    {
        $userRole = [
            'id' => "tests",
            'name' => "tests",
            'description' => "tests"
        ];
        $this->parseUserRoles([$userRole, $userRole, $userRole])->shouldBeArray();
    }

    function it_can_parse_product_short ()
    {
        $productShort = [
            'id' => "test",
            'name' => "test",
            'price' => "test",
            'description' => "test",
            'shortDescription' => "test",
            'organisation' => [
                'id' => "test",
                'name' => "test",
                'code' => "test"
            ],
            'available' => "test",
            'enabled' => "test",
            'sku' => "test",
            'availableOnline' => "test",
            'productType' => [
                'id' => "test",
                'name' => "test",
                'description' => "test"
            ],
            "groupItems" => []
        ];

        $productShort["groupItems"][] = $productShort;

        $this->parseProductShort($productShort)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\ProductShort');
    }

    public function it_can_parse_user ()
    {
        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "types" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];

        $roles = [
            'id' => "tests",
            'name' => "tests",
            'description' => "tests"
        ];
        $group = [
            'id' => "tests",
            'name' => "tests",
            'description' => "tests",
            'roles' => [$roles, $roles, $roles]
        ];
        $user = [
            'id' => "tests",
            'enabled' => "tests",
            'username' => "tests",
            'facebook_id' => "tests",
            "profile" => [
                'firstName' => "test",
                'surname' => "test",
                'email' => "test",
                'nickName' => "test",
                'cellphoneNumber' => "test",
                'sex' => "test"
            ],
            "groups" => [$group, $group, $group],
            'roles' => [$roles, $roles, $roles],
            'organisations' => [$organisation, $organisation, $organisation]
        ];
        $this->parseUser($user)->shouldReturnAnInstanceOf('Ordercloud\Entities\Users\User');
    }

    function it_can_parse_order_items ()
    {
        $productShort = [
            'id' => "test",
            'name' => "test",
            'price' => "test",
            'description' => "test",
            'shortDescription' => "test",
            'organisation' => [
                'id' => "test",
                'name' => "test",
                'code' => "test"
            ],
            'available' => "test",
            'enabled' => "test",
            'sku' => "test",
            'availableOnline' => "test",
            'productType' => [
                'id' => "test",
                'name' => "test",
                'description' => "test"
            ],
            "groupItems" => []
        ];

        $orderStatus = [
            'id'          => 1,
            'name'        => 'Testing',
            'description' => 'TST'
        ];


        $productPriceDiscount = [
            'discountAmount' => "1",
            'discountPrice' => "1"
        ];

        $productExtraDisplay = [
            'id' => "test",
            'name' => "test",
            'description' => "test",
            'price' => "test",
            'tags' => [
                [
                    'id'               => 1,
                    'name'             => "test",
                    'description'      => "test",
                    'shortDescription' => "test",
                    'enabled'          => "test",
                    'childTags'        => [],
                    'tagType'          => [
                        'id'          => "test",
                        'description' => "test",
                        'name'        => "test",
                        'dateCreated' => "test",
                        'lastUpdated' => "test"
                    ],
                    'organisation'     => [
                        'id'   => "test",
                        'name' => "test",
                        'code' => "test"
                    ],
                    'parentTag'        => [
                        'id'   => 'test',
                        'name' => 'test'
                    ]
                ]
            ]
        ];

        $extra = [
            'id' => "test",
            'price' => "test",
            'extra' => $productExtraDisplay
        ];

        $productOptionsDisplay = [
            'id' => "test",
            'name' => "test",
            'description' => "test",
            'price' => "test",
            'tags' => [
                [
                    'id'               => 1,
                    'name'             => "test",
                    'description'      => "test",
                    'shortDescription' => "test",
                    'enabled'          => "test",
                    'childTags'        => [],
                    'tagType'          => [
                        'id'          => "test",
                        'description' => "test",
                        'name'        => "test",
                        'dateCreated' => "test",
                        'lastUpdated' => "test"
                    ],
                    'organisation'     => [
                        'id'   => "test",
                        'name' => "test",
                        'code' => "test"
                    ],
                    'parentTag'        => [
                        'id'   => 'test',
                        'name' => 'test'
                    ]
                ]
            ]
        ];

        $option = [
            'id' => "test",
            'price' => "test",
            'option' => $productOptionsDisplay
        ];

        $item = [
            'id' => "tests",
            'price' => "tests",
            'quantity' => "tests",
            'enabled' => "tests",
            'detail' => $productShort,
            'status' => $orderStatus,
            'note' => "tests",
            'itemDiscount' => $productPriceDiscount,
            'readyEstimate' => "tests",
            'extras' => [$extra, $extra, $extra],
            'options' => [$option, $option, $option]
        ];

        $this->parseOrderItems([$item, $item, $item])->shouldBeArray();
    }

    function it_can_parse_order_item_extras ()
    {
        $productExtraDisplay = [
            'id' => "test",
            'name' => "test",
            'description' => "test",
            'price' => "test",
            'tags' => [
                [
                    'id'               => 1,
                    'name'             => "test",
                    'description'      => "test",
                    'shortDescription' => "test",
                    'enabled'          => "test",
                    'childTags'        => [],
                    'tagType'          => [
                        'id'          => "test",
                        'description' => "test",
                        'name'        => "test",
                        'dateCreated' => "test",
                        'lastUpdated' => "test"
                    ],
                    'organisation'     => [
                        'id'   => "test",
                        'name' => "test",
                        'code' => "test"
                    ],
                    'parentTag'        => [
                        'id'   => 'test',
                        'name' => 'test'
                    ]
                ]
            ]
        ];

        $extra = [
            'id' => "test",
            'price' => "test",
            'extra' => $productExtraDisplay
        ];
        $this->parseOrderItemExtras([$extra, $extra, $extra])->shouldBeArray();
    }

    function it_can_parse_order_item_options ()
    {
        $productOptionDisplay = [
            'id' => "test",
            'name' => "test",
            'description' => "test",
            'price' => "test",
            'tags' => [
                [
                    'id'               => 1,
                    'name'             => "test",
                    'description'      => "test",
                    'shortDescription' => "test",
                    'enabled'          => "test",
                    'childTags'        => [],
                    'tagType'          => [
                        'id'          => "test",
                        'description' => "test",
                        'name'        => "test",
                        'dateCreated' => "test",
                        'lastUpdated' => "test"
                    ],
                    'organisation'     => [
                        'id'   => "test",
                        'name' => "test",
                        'code' => "test"
                    ],
                    'parentTag'        => [
                        'id'   => 'test',
                        'name' => 'test'
                    ]
                ]
            ]
        ];

        $option = [
            'id' => "test",
            'price' => "test",
            'option' => $productOptionDisplay
        ];
        $this->parseOrderItemOptions([$option, $option, $option])->shouldBeArray();
    }

    function it_can_parse_order ()
    {
        $productShort = [
            'id' => "test",
            'name' => "test",
            'price' => "test",
            'description' => "test",
            'shortDescription' => "test",
            'organisation' => [
                'id' => "test",
                'name' => "test",
                'code' => "test"
            ],
            'available' => "test",
            'enabled' => "test",
            'sku' => "test",
            'availableOnline' => "test",
            'productType' => [
                'id' => "test",
                'name' => "test",
                'description' => "test"
            ],
            "groupItems" => []
        ];

        $orderStatus = [
            'id'          => 1,
            'name'        => 'Testing',
            'description' => 'TST'
        ];


        $productPriceDiscount = [
            'discountAmount' => "1",
            'discountPrice' => "1"
        ];

        $productExtraDisplay = [
            'id' => "test",
            'name' => "test",
            'description' => "test",
            'price' => "test",
            'tags' => [
                [
                    'id'               => 1,
                    'name'             => "test",
                    'description'      => "test",
                    'shortDescription' => "test",
                    'enabled'          => "test",
                    'childTags'        => [],
                    'tagType'          => [
                        'id'          => "test",
                        'description' => "test",
                        'name'        => "test",
                        'dateCreated' => "test",
                        'lastUpdated' => "test"
                    ],
                    'organisation'     => [
                        'id'   => "test",
                        'name' => "test",
                        'code' => "test"
                    ],
                    'parentTag'        => [
                        'id'   => 'test',
                        'name' => 'test'
                    ]
                ]
            ]
        ];

        $extra = [
            'id' => "test",
            'price' => "test",
            'extra' => $productExtraDisplay
        ];

        $productOptionsDisplay = [
            'id' => "test",
            'name' => "test",
            'description' => "test",
            'price' => "test",
            'tags' => [
                [
                    'id'               => 1,
                    'name'             => "test",
                    'description'      => "test",
                    'shortDescription' => "test",
                    'enabled'          => "test",
                    'childTags'        => [],
                    'tagType'          => [
                        'id'          => "test",
                        'description' => "test",
                        'name'        => "test",
                        'dateCreated' => "test",
                        'lastUpdated' => "test"
                    ],
                    'organisation'     => [
                        'id'   => "test",
                        'name' => "test",
                        'code' => "test"
                    ],
                    'parentTag'        => [
                        'id'   => 'test',
                        'name' => 'test'
                    ]
                ]
            ]
        ];

        $option = [
            'id' => "test",
            'price' => "test",
            'option' => $productOptionsDisplay
        ];

        $item = [
            'id' => "tests",
            'price' => "tests",
            'quantity' => "tests",
            'enabled' => "tests",
            'detail' => $productShort,
            'status' => $orderStatus,
            'note' => "tests",
            'itemDiscount' => $productPriceDiscount,
            'readyEstimate' => "tests",
            'extras' => [$extra, $extra, $extra],
            'options' => [$option, $option, $option]
        ];

        $userProfile = [
            'firstName' => "test",
            'surname' => "test",
            'email' => "test@test.com",
            'nickName' => "test",
            'cellphoneNumber' => "0848300757",
            'sex' => "M"
        ];

        $user = [
            "id"       => 1,
            "username" => "test@test.com",
            "profile"  => $userProfile
        ];

        $address = [
            'id' => "test",
            'name' => "test",
            'streetNumber' => "test",
            'streetName' => "test",
            'complex' => "test",
            'suburb' => "test",
            'city' => "test",
            'postalCode' => "test",
            'note' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "types" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];

        $payment = [
            'id' => "tests",
            'lastPaymentStatus' => [
                'status' => "test",
                'when' => "test",
                'message' => "test"
            ],
            'gatewayTransactionId' => "tests",
            'requestId' => "tests",
            'requestedByUser' => [
                "id"       => "test",
                "username" => "test"
            ],
            'requestedByOrganisation' => $organisation,
            'assetTypeCode' => "tests",
            'amount' => "tests",
            'paymentMethod' => "tests",
            'gateway' => "tests",
            'grouping' => "tests"
        ];

        $deliveryAgent = [
            'id'           => "test",
            'user'  => [
                'id' => 1,
                'username' => 'test',
                'profile' => [
                    'firstName'       => "test",
                    'firstName'       => "test",
                    'surname'         => "test",
                    'email'           => "test",
                    'nickName'        => "test",
                    'cellphoneNumber' => "test",
                    'sex'             => "test"
                ],
            ],
            'organisation' => [
                'id'   => "TEST",
                'name' => "TEST",
                'code' => "TEST"
            ],
            'minBalance'   => "test",
            'maxBalance'   => "test",
            'enabled'      => "test",
            'status'       => [
                'id'     => "TEST",
                'status' => "TEST"
            ],
            'accountNo'    => "test",
            'cardNo'       => "test"
        ];

        $order = [
            'id' => "tests",
            'reference' => "tests",
            'shortReference' => "tests",
            'dateCreated' => "tests",
            'lastUpdated' => "tests",
            'amount' => "tests",
            'status' => [
                'id' => "test",
                'name' => "test",
                'description' => "test"
            ],
            'items' => [$item, $item, $item],
            'user' => $user,
            'userGeo' => $address,
            'organisation' => [
                'id'   => 1,
                'name' => 'Testing',
                'code' => 'TST'
            ],
            'paymentStatus' => [
                'status' => "test",
                'when' => "test",
                'message' => "test"
            ],
            "payments" => [$payment, $payment, $payment],
            'paymentMethod' => ["tests", "tests"],
            'deliveryType' => "tests",
            'deliveryAgent' => $deliveryAgent,
            'note' => "test",
            'instorePaymentRequired' => "test"
        ];

        $this->parseOrder($order)->shouldReturnAnInstanceOf('Ordercloud\Entities\Orders\Order');
    }

    function it_can_parse_product_tag ()
    {
        $productTag = [
            'id'               => "test",
            'name'             => "test",
            'description'      => "test",
            'shortDescription' => "test",
            'enabled'          => "test",
            'tagType'          => [
                'id'          => "test",
                'description' => "test",
                'name'        => "test",
                'dateCreated' => "test",
                'lastUpdated' => "test"
            ],
            'organisation'     => [
                "id"   => "test",
                "name" => "test",
                "code" => "test"
            ],
            'parentTag'        => [
                "id"   => "test",
                "name" => "test"
            ],
            "childTags"        => []
        ];
        $this->parseProductTags([$productTag, $productTag, $productTag])->shouldBeArray();
    }

    function it_can_parse_payment ()
    {
        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "types" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];

        $payment = [
            'id' => "tests",
            'lastPaymentStatus'  => [
                'status'=> "test",
                'when'=> "test",
                'message'=> "test"
            ],
            'gatewayTransactionId' => "tests",
            'requestId' => "tests",
            'requestedByUser'  => [
                'id' => "tests",
                'username' => "tests"
            ],
            'requestedByOrganisation'  => $organisation,
            'assetTypeCode' => "tests",
            'amount' => "tests",
            'paymentMethod' => "tests",
            'gateway' => "tests",
            'grouping' => "tests"
        ];
        $this->parsePayment($payment)->shouldReturnAnInstanceOf('Ordercloud\Entities\Payments\Payment');
    }

    function it_can_parse_product ()
    {
        $organisationData = [
            'id'   => 1,
            'name' => 'Testing',
            'code' => 'TST'
        ];

        $attribute = [
            'id' => "tests",
            'enabled' => "tests",
            'organisation' => $organisationData
        ];

        $productTag = [
            'id'               => "asd",
            'name'             => "test",
            'description'      => "test",
            'shortDescription' => "test",
            'enabled'          => "test",
            'tagType'          => [
                'id'          => "test",
                'description' => "test",
                'name'        => "test",
                'dateCreated' => "test",
                'lastUpdated' => "test"
            ],
            'organisation'     => [
                "id"   => "test",
                "name" => "test",
                "code" => "test"
            ],
            'parentTag'        => [
                "id"   => "test",
                "name" => "test"
            ],
            "childTags"        => []
        ];

        $option = [
            'id' => "tests",
            'name' => "tests",
            'description' => "tests",
            'price' => "tests",
            'enabled' => "tests",
            'organisation' => $organisationData,
            'tags' => [$productTag, $productTag, $productTag]
        ];

        $extra = [
            'id' => "tests",
            'name' => "tests",
            'description' => "tests",
            'price' => "tests",
            'enabled' => "tests",
            'organisation' => $organisationData,
            'tags' => [$productTag]
        ];

        $productTag = [
            'id'               => "test",
            'name'             => "test",
            'description'      => "test",
            'shortDescription' => "test",
            'enabled'          => "test",
            'tagType'          => [
                'id'          => "test",
                'description' => "test",
                'name'        => "test",
                'dateCreated' => "test",
                'lastUpdated' => "test"
            ],
            'organisation'     => [
                "id"   => "test",
                "name" => "test",
                "code" => "test"
            ],
            'parentTag'        => [
                "id"   => "test",
                "name" => "test"
            ],
            "childTags"        => []
        ];

        $image = [
            'name' => "tests",
            'thumbnail' => "tests"
        ];

        $organisationData = [
            'id'   => 1,
            'name' => 'Testing',
            'code' => 'TST'
        ];

        $connectionType = [
            "id" => "test",
            "name" => "test",
            "code" => "test"
        ];

        $feeType = [
            'id' => "test",
            'code' => "test",
            'name' => "test",
            'description' => "test"
        ];

        $feeMetric = [
            'id' => "Test",
            'code' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $feeStructure = [
            'id' => "test",
            'code' => "test",
            'name' => "test",
            'description' => "test",
            'rule' => "test",
            'rule_name' => "test",
            'percentage' => "test",
            'flatfee' => "test",
            'volume' => "test"
        ];

        $feeDetail = [
            "id"  => "test",
            "minValue" => "test",
            "maxValue" => "test",
            "fixedAmount" => "test",
            "percentageAmount" => "test",
            "volumeAmount" => "test",
            "enabled" => "test"
        ];

        $fee = [
            'id' => "test",
            'startDate' => "test",
            'endDate' => "test",
            'enabled' => "test",
            'lastUpdated' => "test",
            'details' => [$feeDetail, $feeDetail, $feeDetail],
            'type' => $feeType,
            'metric' => $feeMetric,
            'structure' => $feeStructure
        ];

        $type = [
            'id' => "test",
            'name' => "test",
            'plural' => "test"
        ];

        $industry = [
            'id' => "Test",
            'name' => "Test",
            'description' => "Test"
        ];

        $profile = [
            'id' => "test",
            'contactPerson' => [
                "id" => "test",
                "username" => "test@test.com",
                "profile" => [
                    'firstName' => "Test",
                    'surname' => "Test",
                    'email' => "Test",
                    'nickName' => "Test",
                    'cellphoneNumber' => "Test",
                    'sex' => "Test"
                ]
            ],
            'contactNumber' => "test",
            'enabled' => "test",
            'distance' => "test",
            'latitude' => "test",
            'longitude' => "test"
        ];

        $operatingHour = [
            'id' => "tyerst",
            'day' => "tyerst",
            'openTime' => "tyerst",
            'closeTime' => "tyerst",
            'dayName' => "tyerst"
        ];

        $organisation = [
            'id' => "test",
            'name' => "test",
            'code' => "test",
            "type" => [$type, $type, $type],
            'industries' => [$industry, $industry, $industry],
            "profile" => [$profile, $profile, $profile],
            'operatingHours' => [$operatingHour, $operatingHour, $operatingHour],
            'ordersHash' => "test",
            'status' => [
                "id" => "test",
                "name" => "test",
                "description" => "test"
            ],
            'lastOnline' => "test",
            'delivering' => "test",
            'open' => "test",
            'registeredDirectly' => "test"
        ];

        $fees = [$fee, $fee, $fee];

        $connection = [
            "id" => "test",
            "toOrganisation",
            "fromOrganisation",
            "ended" => "test",
            'enabled' => "test",
            'status' => "test",
            'settlementInterval' => "test",
            'type' => $connectionType,
            "fee" => $fees,
            "fromOrganisation" => $organisation,
            "toOrganisation" => $organisation
        ];

        $productPriceDiscount = [
            'discountAmount' => "tests",
            'discountPrice' => "tests"
        ];

        $productShort = [
            'id' => "test",
            'name' => "test",
            'price' => "test",
            'description' => "test",
            'shortDescription' => "test",
            'organisation' => [
                'id' => "test",
                'name' => "test",
                'code' => "test"
            ],
            'available' => "test",
            'enabled' => "test",
            'sku' => "test",
            'availableOnline' => "test",
            'productType' => [
                'id' => "test",
                'name' => "test",
                'description' => "test"
            ],
            "groupItems" => [],
            "attributes" => [],
            "options" => [],
            "extras" => [],
            "tags" => [],
            "images" => [],
            "discount" => $productPriceDiscount
        ];

        $productShort["groupItems"][] = $productShort;

        $product = [
            'id' => "tests",
            'name' => "tests",
            'description' => "tests",
            'shortDescription' => "tests",
            'sku' => "tests",
            'price' => "tests",
            'enabled' => "Tests",
            'available' => "Tests",
            'availableOnline' => "Tests",
            'attributes' => [$attribute, $attribute, $attribute],
            'options' => [$option, $option, $option],
            'extras' => [$extra, $extra, $extra],
            'tags' => [$productTag, $productTag, $productTag],
            'organisation' => [
                'id'   => 1,
                'name' => 'Testing',
                'code' => 'TST'
            ],
            'images' => [$image, $image, $image],
            'groupItems' => [$productShort],
            'productType' => [
                'id'          => "test",
                'name'        => "test",
                'description' => "test"
            ],
            'discount' => $productPriceDiscount
        ];
        $this->parseProduct($product)->shouldReturnAnInstanceOf('Ordercloud\Entities\Products\Product');
    }
}
