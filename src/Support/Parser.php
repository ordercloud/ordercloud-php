<?php namespace Ordercloud\Support;

use Ordercloud\Entities\Connections\Connection;
use Ordercloud\Entities\Connections\ConnectionFee;
use Ordercloud\Entities\Connections\ConnectionFeeDetail;
use Ordercloud\Entities\Connections\ConnectionFeeMetric;
use Ordercloud\Entities\Connections\ConnectionFeeStructure;
use Ordercloud\Entities\Connections\ConnectionFeeType;
use Ordercloud\Entities\Connections\ConnectionType;
use Ordercloud\Entities\Delivery\DeliveryAgent;
use Ordercloud\Entities\Delivery\DeliveryAgentStatus;
use Ordercloud\Entities\Orders\OrderItem;
use Ordercloud\Entities\Orders\OrderItemExtra;
use Ordercloud\Entities\Orders\OrderItemOption;
use Ordercloud\Entities\Orders\OrderStatus;
use Ordercloud\Entities\Organisations\Organisation;
use Ordercloud\Entities\Organisations\OrganisationIndustry;
use Ordercloud\Entities\Organisations\OrganisationOperatingHours;
use Ordercloud\Entities\Organisations\OrganisationProfile;
use Ordercloud\Entities\Organisations\OrganisationShort;
use Ordercloud\Entities\Organisations\OrganisationStatus;
use Ordercloud\Entities\Organisations\OrganisationType;
use Ordercloud\Entities\Organisations\Settings\OrganisationSetting;
use Ordercloud\Entities\Organisations\Settings\OrganisationSettingKey;
use Ordercloud\Entities\Payments\Payment;
use Ordercloud\Entities\Payments\PaymentStatus;
use Ordercloud\Entities\Products\Product;
use Ordercloud\Entities\Products\ProductAttribute;
use Ordercloud\Entities\Products\ProductDiscount;
use Ordercloud\Entities\Products\ProductExtra;
use Ordercloud\Entities\Products\ProductExtraDisplay;
use Ordercloud\Entities\Products\ProductImage;
use Ordercloud\Entities\Products\ProductOption;
use Ordercloud\Entities\Products\ProductOptionDisplay;
use Ordercloud\Entities\Products\ProductPriceDiscount;
use Ordercloud\Entities\Products\ProductShort;
use Ordercloud\Entities\Products\ProductTag;
use Ordercloud\Entities\Products\ProductTagLink;
use Ordercloud\Entities\Products\ProductTagType;
use Ordercloud\Entities\Products\ProductType;
use Ordercloud\Entities\Users\DisplayUser;
use Ordercloud\Entities\Users\User;
use Ordercloud\Entities\Users\UserAddress;
use Ordercloud\Entities\Users\UserGroup;
use Ordercloud\Entities\Users\UserProfile;
use Ordercloud\Entities\Users\UserRole;
use Ordercloud\Entities\Users\UserShort;
use Ordercloud\Entities\Orders\Order;

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
        foreach ($organisation['types'] as $type) {
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
            $this->parseOrganisationStatus($organisation['status']),
            $organisation['lastOnline'],
            $organisation['delivering'],
            $organisation['open'],
            $organisation['registeredDirectly']
        );
    }

    /**
     * @param array $connections
     *
     * @return array|Connection[]
     */
    public function parseConnections(array $connections)
    {
        $parsedConnections = [];

        foreach ($connections as $connection) {
            $parsedConnections[] = $this->parseConnection($connection);
        }

        return $parsedConnections;
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
     * @return \Ordercloud\Entities\Organisations\Settings\OrganisationSetting
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
            $this->parseProductType($itemDetail['productType']),
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
     * @return \Ordercloud\Entities\Users\UserProfile
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
    public function parseUserShort(array $userShort)
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
                $this->parseUserRoles($group['roles'])
            );
        }

        return new User(
            $user['id'],
            $user['enabled'],
            $user['username'],
            $user['facebook_id'],
            $this->parseUserProfile($user["profile"]),
            $groups,
            $this->parseUserRoles($user['roles']),
            $this->parseOrganisations($user['organisations'])
        );
    }

    /**
     * @param array $productPriceDiscount
     *
     * @return \Ordercloud\Entities\Products\ProductPriceDiscount
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
                $this->parseProductShort($item['detail']),
                $this->parseOrderStatus($item['status']),
                $item['note'],
                $this->parseProductPriceDiscount($item['itemDiscount']),
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
     * @return \Ordercloud\Entities\Payments\PaymentStatus
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
     * @return \Ordercloud\Entities\Products\ProductExtraDisplay
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
     * @return array|\Ordercloud\Entities\Products\ProductTag[]
     */
    public function parseProductTags(array $productTags)
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

    public function parseProductTagTypes(array $productTagTypes)
    {
        $parsedTags = [];

        foreach ($productTagTypes as $tagType) {
            $parsedTags[] = $this->parseProductTagType($tagType);
        }

        return $parsedTags;
    }

    public function parseProductTagLink(array $productTagLink)
    {
        return new ProductTagLink(
            $productTagLink['id'],
            $productTagLink['name']
        );
    }

    /**
     * @param array $product
     *
     * @return Product
     */
    public function parseProduct(array $product)
    {
        return new Product(
            $product['id'],
            $product['name'],
            $product['description'],
            $product['shortDescription'],
            $product['sku'],
            $product['price'],
            $this->parseProductAttributes($product['attributes']),
            $this->parseProductOptions($product['options']),
            $this->parseProductExtras($product['extras']),
            $this->parseProductTags($product['tags']),
            $this->parseOrganisationShort($product['organisation']),
            $product['enabled'],
            $product['available'],
            $product['availableOnline'],
            $this->parseProductImages($product['images']),
            $this->parseProducts($product['groupItems']),
            $this->parseProductType($product['productType']),
            $this->parseProductPriceDiscount($product['discount'])
        );
    }

    /**
     * @param array $products
     *
     * @return array|Product[]
     */
    public function parseProducts(array $products)
    {
        $parsedProducts = [];

        foreach ($products as $product) {
            $parsedProducts[] = $this->parseProduct($product);
        }

        return $parsedProducts;
    }


    public function parseProductAttributes(array $attributes)
    {
        $parsedAttributes = [];

        foreach ($attributes as $attribute) {
            $parsedAttributes[] = new ProductAttribute(
                $attribute['id'],
                $attribute['enabled'],
                $this->parseOrganisationShort($attribute['organisation'])
            );
        }

        return $parsedAttributes;
    }

    public function parseProductOptions(array $options)
    {
        $parsedOptions = [];

        foreach ($options as $option) {
            $parsedOptions[] = new ProductOption(
                $option['id'],
                $option['name'],
                $option['description'],
                $option['price'],
                $option['enabled'],
                $this->parseOrganisationShort($option['organisation']),
                $this->parseProductTags($option['tags'])
            );
        }

        return $parsedOptions;
    }

    public function parseProductExtras(array $extras)
    {
        $parsedExtras = [];

        foreach ($extras as $extra) {
            $parsedExtras[] = new ProductExtra(
                $extra['id'],
                $extra['name'],
                $extra['description'],
                $extra['price'],
                $extra['enabled'],
                $this->parseOrganisationShort($extra['organisation']),
                $this->parseProductTags($extra['tags'])
            );
        }

        return $parsedExtras;
    }

    public function parseProductImages(array $images)
    {
        $parsedImages = [];

        foreach ($images as $image) {
            $parsedImages[] = new ProductImage(
                $image['name'],
                $image['thumbnail']
            );
        }

        return $parsedImages;
    }

    public function parseProductType(array $productType)
    {
        return new ProductType(
            $productType['id'],
            $productType['name'],
            $productType['description']
        );
    }

    public function parseProductDiscount(array $discount)
    {
        return new ProductDiscount(
            $discount['id'],
            $this->parseOrganisationShort($discount['organisation']),
            $this->parseOrganisationShort($discount['discountProvider']),
            $this->parseOrganisationShort($discount['brand']),
            $this->parseConnection($discount['connection']),
            $this->parseProduct($discount['productItem']),
            $discount['amount'],
            $discount['startDate'],
            $discount['enabled']
        );
    }

    /**
     * @param $connection
     *
     * @return Connection
     */
    public function parseConnection($connection)
    {
        $type = new ConnectionType(
            $connection['type']['id'],
            $connection['type']['name'],
            $connection['type']['code']
        );

        $fees = [];
        foreach ($connection['fee'] as $fee) {
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
                $this->parseConnectionFeeDetails($fee['details']),
                $feeType,
                $metric,
                $structure
            );
        }

        return new Connection(
            $connection['id'],
            $this->parseOrganisation($connection['fromOrganisation']),
            $this->parseOrganisation($connection['toOrganisation']),
            $type,
            $connection['ended'],
            $fees,
            $connection['enabled'],
            $connection['status'],
            $connection['settlementInterval']
        );
    }

    public function parseConnectionFeeDetail(array $fee)
    {
        return new ConnectionFeeDetail(
            $fee["id"],
            $fee["minValue"],
            $fee["maxValue"],
            $fee["fixedAmount"],
            $fee["percentageAmount"],
            $fee["volumeAmount"],
            $fee["enabled"]
        );
    }

    public function parseConnectionFeeDetails(array $fees)
    {
        $parsedFees = [];
        foreach($fees as $fee)
        {
            $parsedFees[] = $this->parseConnectionFeeDetail($fee);
        }
        return $parsedFees;
    }

    public function parseOrganisationStatus ($status)
    {
        return new OrganisationStatus(
            $status["id"],
            $status["name"],
            $status["description"]
        );
    }

}
