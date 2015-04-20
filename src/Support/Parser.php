<?php namespace Ordercloud\Support;

use Ordercloud\Connections\Connection;
use Ordercloud\Connections\ConnectionFee;
use Ordercloud\Connections\ConnectionFeeMetric;
use Ordercloud\Connections\ConnectionFeeStructure;
use Ordercloud\Connections\ConnectionFeeType;
use Ordercloud\Connections\ConnectionType;
use Ordercloud\Delivery\DeliveryAgent;
use Ordercloud\Delivery\DeliveryAgentStatus;
use Ordercloud\Orders\Order;
use Ordercloud\Orders\OrderItemExtra;
use Ordercloud\Orders\OrderItemOption;
use Ordercloud\Orders\OrderStatus;
use Ordercloud\Organisations\Organisation;
use Ordercloud\Organisations\OrganisationIndustry;
use Ordercloud\Organisations\OrganisationOperatingHours;
use Ordercloud\Organisations\OrganisationProfile;
use Ordercloud\Organisations\OrganisationShort;
use Ordercloud\Organisations\OrganisationType;
use Ordercloud\Organisations\Settings\OrganisationSetting;
use Ordercloud\Organisations\Settings\OrganisationSettingKey;
use Ordercloud\Payments\Payment;
use Ordercloud\Payments\PaymentStatus;
use Ordercloud\Products\ProductExtraDisplay;
use Ordercloud\Products\ProductOptionDisplay;
use Ordercloud\Products\ProductPriceDiscount;
use Ordercloud\Products\ProductShort;
use Ordercloud\Products\ProductTag;
use Ordercloud\Products\ProductTagLink;
use Ordercloud\Products\ProductTagType;
use Ordercloud\Products\ProductType;
use Ordercloud\Users\DisplayUser;
use Ordercloud\Users\User;
use Ordercloud\Users\UserAddress;
use Ordercloud\Users\UserGroup;
use Ordercloud\Users\UserProfile;
use Ordercloud\Users\UserRole;
use Ordercloud\Users\UserShort;

class Parser
{
    /**
     * @param array $organisations
     *
     * @return array|Organisation[]
     */
    public function parseOrganisations(array $organisations)
    {
        $parsedOrganisations = [];

        foreach ($organisations as $organisation) {
            $parsedOrganisations[] = $this->parseOrganisation($organisation);
        }

        return $parsedOrganisations;
    }

    /**
     * @param array $organisation
     *
     * @return Organisation
     */
    public function parseOrganisation(array $organisation)
    {
        $types = [];
        foreach ($organisation['type'] as $type) {
            $types[] = new OrganisationType(
                $type['id'],
                $type['name'],
                $type['plural']
            );
        }

        $operatingHours = [];
        foreach ($organisation['operatingHours'] as $operatingTimes) {
            $operatingHours[] = new OrganisationOperatingHours(
                $operatingTimes['id'],
                $operatingTimes['day'],
                $operatingTimes['openTime'],
                $operatingTimes['closeTime'],
                $operatingTimes['dayName']
            );
        }

        $profiles = [];
        foreach ($organisation['profile'] as $profile) {
            $profiles[] = new OrganisationProfile(
                $profile['id'],
                $this->parseUserShort($profile['contactPerson']),
                $profile['contactNumber'],
                $profile['enabled'],
                $profile['distance'],
                $profile['latitude'],
                $profile['longitude']
            );
        }

        $industries = [];
        foreach ($organisation['industries'] as $industry) {
            $industries[] = new OrganisationIndustry(
                $industry['id'],
                $industry['name'],
                $industry['description']
            );
        }

        return new Organisation(
            $organisation['id'],
            $organisation['name'],
            $organisation['code'],
            $types,
            $industries,
            $profiles,
            $operatingHours,
            $organisation['ordersHash'],
            $organisation['status'],
            $organisation['lastOnline'],
            $organisation['delivering'],
            $organisation['open'],
            $organisation['registeredDirectly']
        );
    }

    /**
     * @param array $connectedMarketPlacesData
     *
     * @return array|Connection[]
     */
    public function parseConnections(array $connectedMarketPlacesData)
    {
        $connectedMarketPlaces = [];

        foreach ($connectedMarketPlacesData as $connectedMarketPlaceData) {
            $type = new ConnectionType(
                $connectedMarketPlaceData['type']['id'],
                $connectedMarketPlaceData['type']['name'],
                $connectedMarketPlaceData['type']['code']
            );

            $fees = [];
            foreach ($connectedMarketPlaceData['fee'] as $fee) {
                $feeType = new ConnectionFeeType(
                    $fee['type']['id'],
                    $fee['type']['code'],
                    $fee['type']['name'],
                    $fee['type']['description']
                );

                $metric = new ConnectionFeeMetric(
                    $fee['metric']['id'],
                    $fee['metric']['code'],
                    $fee['metric']['name'],
                    $fee['metric']['description']
                );

                $structure = new ConnectionFeeStructure(
                    $fee['structure']['id'],
                    $fee['structure']['code'],
                    $fee['structure']['name'],
                    $fee['structure']['description'],
                    $fee['structure']['rule'],
                    $fee['structure']['rule_name'],
                    $fee['structure']['percentage'],
                    $fee['structure']['flatfee'],
                    $fee['structure']['volume']
                );

                $fees[] = new ConnectionFee(
                    $fee['id'],
                    $fee['startDate'],
                    $fee['endDate'],
                    $fee['enabled'],
                    $fee['lastUpdated'],
                    $fee['details'],
                    $feeType,
                    $metric,
                    $structure
                );
            }

            $connectedMarketPlaces[] = new Connection(
                $connectedMarketPlaceData['id'],
                $this->parseOrganisation($connectedMarketPlaceData['fromOrganisation']),
                $this->parseOrganisation($connectedMarketPlaceData['toOrganisation']),
                $type,
                $connectedMarketPlaceData['ended'],
                $fees,
                $connectedMarketPlaceData['enabled'],
                $connectedMarketPlaceData['status'],
                $connectedMarketPlaceData['settlementInterval']
            );
        }

        return $connectedMarketPlaces;
    }

    /**
     * @param array $roles
     *
     * @return array
     */
    public function parseUserRoles(array $roles)
    {
        $userRoles = [];

        foreach ($roles as $role) {
            $userRoles[] = new UserRole(
                $role['id'],
                $role['name'],
                $role['description']
            );
        }

        return $userRoles;
    }

    /**
     * @param array $organisation
     *
     * @return OrganisationShort
     */
    public function parseOrganisationShort(array $organisation)
    {
        return new OrganisationShort(
            $organisation['id'],
            $organisation['name'],
            $organisation['code']
        );
    }

    /**
     * @param array $setting
     *
     * @return OrganisationSetting
     */
    public function parseOrganisationSetting(array $setting)
    {
        $key = new OrganisationSettingKey(
            $setting['key']['id'],
            $setting['key']['name']
        );

        return new OrganisationSetting(
            $setting['id'],
            $setting['value'],
            $key,
            $setting['startDate'],
            $setting['endDate'],
            $setting['dateCreated'],
            $setting['lastUpdated'],
            $this->parseOrganisationShort($setting['organisation'])
        );
    }

    /**
     * @param array $itemDetail
     *
     *@return array
     */
    public function parseProductShort(array $itemDetail)
    {
        $productType = new ProductType(
            $itemDetail['productType']['id'],
            $itemDetail['productType']['name'],
            $itemDetail['productType']['description']
        );

        $groupItems = [];
        foreach ($itemDetail['groupItems'] as $groupItem) {
            $groupItems[] = $this->parseProductShort($groupItem);
        }

        return new ProductShort(
            $itemDetail['id'],
            $itemDetail['name'],
            $itemDetail['price'],
            $itemDetail['description'],
            $itemDetail['shortDescription'],
            $this->parseOrganisationShort($itemDetail['organisation']),
            $itemDetail['available'],
            $itemDetail['enabled'],
            $itemDetail['sku'],
            $itemDetail['availableOnline'],
            $productType,
            $groupItems
        );
    }

    /**
     * @param array $status
     *
     * @return OrderStatus
     */
    public function parseOrderStatus(array $status)
    {
        return new OrderStatus(
            $status['id'],
            $status['name'],
            $status['description']
        );
    }

    /**
     * @param array $userProfile
     *
     * @return UserProfile
     */
    public function parseUserProfile(array $userProfile)
    {
        return new UserProfile(
            $userProfile['firstName'],
            $userProfile['surname'],
            $userProfile['email'],
            $userProfile['nickName'],
            $userProfile['cellphoneNumber'],
            $userProfile['sex']
        );
    }

    /**
     * @param array $userShort
     *
     * @return UserShort
     */
    protected function parseUserShort(array $userShort)
    {
        return new UserShort(
            $userShort['id'],
            $userShort['username'],
            $this->parseUserProfile($userShort['profile'])
        );
    }

    /**
     * @param $user
     *
     * @return User
     */
    public function parseUser($user)
    {
        $groups = [];
        foreach ($user['groups'] as $group) {
            $groups[] = new UserGroup(
                $group['id'],
                $group['name'],
                $group['description'],
                $this->parser->parseUserRoles($group['roles'])
            );
        }

        return new User(
            $user['id'],
            $user['enabled'],
            $user['username'],
            $user['facebook_id'],
            $this->parser->parseUserProfile($user),
            $groups,
            $this->parser->parseUserRoles($user['roles']),
            $this->parser->parseOrganisations($user['organisations'])
        );
    }

    /**
     * @param array $productPriceDiscount
     *
     * @return ProductPriceDiscount
     */
    public function parseProductPriceDiscount(array $productPriceDiscount)
    {
        return new ProductPriceDiscount(
            $productPriceDiscount['discountAmount'],
            $productPriceDiscount['discountPrice']
        );
    }

    public function parseOrderItems(array $orderItems)
    {
        $items = [];

        foreach ($orderItems as $item) {
            $items[] = new OrderItem(
                $item['id'],
                $item['price'],
                $item['quantity'],
                $item['enabled'],
                $this->parser->parseProductShort($item['detail']),
                $this->parser->parseOrderStatus($item['status']),
                $item['note'],
                $this->parser->parseProductPriceDiscount($item['itemDiscount']),
                $item['readyEstimate'],
                $this->parseOrderItemExtras($item['extras']),
                $this->parseOrderItemOptions($item['options'])
            );
        }

        return $items;
    }

    public function parseOrderItemExtras(array $orderItemExtras)
    {
        $extras = [];

        foreach ($orderItemExtras as $extra) {
            $extras[] = new OrderItemExtra(
                $extra['id'],
                $extra['price'],
                $this->parseProductExtraDisplay($extra['extra'])
            );
        }

        return $extras;
    }

    /**
     * @param array $orderItemOptions
     *
     * @return array
     */
    public function parseOrderItemOptions(array $orderItemOptions)
    {
        $options = [];

        foreach ($orderItemOptions as $option) {
            $options[] = new OrderItemOption(
                $option['id'],
                $option['price'],
                $this->parseProductOptionDisplay($option['option'])
            );
        }

        return $options;
    }

    public function parseOrder(array $order)
    {
        $payments = [];
        foreach ($order['payments'] as $payment) {
            $payments[] = $this->parsePayment($payment);
        }

        return new Order(
            $order['id'],
            $order['reference'],
            $order['shortReference'],
            $order['dateCreated'],
            $order['lastUpdated'],
            $order['amount'],
            $this->parseOrderStatus($order['status']),
            $this->parseOrderItems($order['items']),
            $this->parseUserShort($order['user']),
            $this->parseUserAddress($order['userAddress']),
            $this->parseOrganisationShort($order['organisation']),
            $this->parsePaymentStatus($order['paymentStatus']),
            $payments,
            $order['paymentMethods'],
            $order['deliveryType'],
            $this->parseDeliveryAgent($order['deliveryAgent']),
            $order['note'],
            $order['instorePaymentRequired']
        );
    }

    /**
     * @param array $userAddress
     *
     * @return array
     */
    public function parseUserAddress(array $userAddress)
    {
        return new UserAddress(
            $userAddress['id'],
            $userAddress['name'],
            $userAddress['streetNumber'],
            $userAddress['streetName'],
            $userAddress['complex'],
            $userAddress['suburb'],
            $userAddress['city'],
            $userAddress['postalCode'],
            $userAddress['note'],
            $userAddress['latitude'],
            $userAddress['longitude']
        );
    }

    /**
     * @param array $paymentStatus
     *
     * @return PaymentStatus
     */
    public function parsePaymentStatus(array $paymentStatus)
    {
        return new PaymentStatus(
            $paymentStatus['status'],
            $paymentStatus['when'],
            $paymentStatus['message']
        );
    }

    /**
     * @param array $productExtraDisplay
     *
     * @return ProductExtraDisplay
     */
    public function parseProductExtraDisplay(array $productExtraDisplay)
    {
        return new ProductExtraDisplay(
            $productExtraDisplay['id'],
            $productExtraDisplay['name'],
            $productExtraDisplay['description'],
            $productExtraDisplay['price'],
            $this->parseProductTags($productExtraDisplay['tags'])
        );
    }

    /**
     * @param array $productOptionDisplay
     *
     * @return ProductOptionDisplay
     */
    public function parseProductOptionDisplay(array $productOptionDisplay)
    {
        return new ProductOptionDisplay(
            $productOptionDisplay['id'],
            $productOptionDisplay['name'],
            $productOptionDisplay['description'],
            $productOptionDisplay['price'],
            $this->parseProductTags($productOptionDisplay['tags'])
        );
    }

    /**
     * @param array $deliveryAgent
     *
     * @return DeliveryAgent
     */
    public function parseDeliveryAgent(array $deliveryAgent)
    {
        return new DeliveryAgent(
            $deliveryAgent['id'],
            $this->parseUserProfile($deliveryAgent['userProfile']),
            $this->parseOrganisationShort($deliveryAgent['organisation']),
            $deliveryAgent['minBalance'],
            $deliveryAgent['maxBalance'],
            $deliveryAgent['enabled'],
            $this->parseDeliveryAgentStatus($deliveryAgent['status']),
            $deliveryAgent['accountNo'],
            $deliveryAgent['cardNo']
        );
    }

    /**
     * @param array $deliveryAgentStatus
     *
     * @return DeliveryAgentStatus
     */
    public function parseDeliveryAgentStatus(array $deliveryAgentStatus)
    {
        return new DeliveryAgentStatus(
            $deliveryAgentStatus['id'],
            $deliveryAgentStatus['status']
        );
    }

    /**
     * @param array $productTags
     *
     * @return array|ProductTag[]
     */
    protected function parseProductTags(array $productTags)
    {
        $tags = [];

        foreach ($productTags as $tag) {
            $tags[] = $this->parseProductTag($tag);
        }

        return $tags;
    }

    /**
     * @param array $productTag
     *
     * @return ProductTag
     */
    public function parseProductTag(array $productTag)
    {
        $childTags = [];
        foreach ($productTag['childTags'] as $tag) {
            $childTags[] = $this->parseProductTagLink($tag);
        }

        return new ProductTag(
            $productTag['id'],
            $productTag['name'],
            $productTag['description'],
            $productTag['shortDescription'],
            $productTag['enabled'],
            $this->parseProductTagType($productTag['tagType']),
            $this->parseOrganisationShort($productTag['organisation']),
            $this->parseProductTagLink($productTag['parentTag']),
            $childTags
        );
    }

    /**
     * @param array $payment
     *
     * @return Payment
     */
    public function parsePayment(array $payment)
    {
        return new Payment(
            $payment['id'],
            $this->parsePaymentStatus($payment['lastPaymentStatus']),
            $payment['gatewayTransactionId'],
            $payment['requestId'],
            $this->parseDisplayUser($payment['requestedByUser']),
            $this->parseOrganisation($payment['requestedByOrganisation']),
            $payment['assetTypeCode'],
            $payment['amount'],
            $payment['paymentMethod'],
            $payment['gateway'],
            $payment['grouping']
        );
    }

    /**
     * @param array $displayUser
     *
     * @return DisplayUser
     */
    public function parseDisplayUser(array $displayUser)
    {
        return new DisplayUser(
            $displayUser['id'],
            $displayUser['username']
        );
    }

    /**
     * @param array $productTagType
     *
     * @return ProductTagType
     */
    public function parseProductTagType(array $productTagType)
    {
        return new ProductTagType(
            $productTagType['id'],
            $productTagType['description'],
            $productTagType['name'],
            $productTagType['dateCreated'],
            $productTagType['lastUpdated']
        );
    }

    public function parseProductTagLink(array $productTagLink)
    {
        return new ProductTagLink(
            $productTagLink['id'],
            $productTagLink['name']
        );
    }
}
