<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Orders\CreateOrderRequest;
use Ordercloud\Requests\Orders\Entities\NewOrderItem;
use Ordercloud\Requests\Orders\Entities\NewOrderItemExtra;
use Ordercloud\Requests\Orders\Entities\NewOrderItemOption;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateOrderRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param CreateOrderRequest $request
     *
     * @return int
     */
    public function handle($request)
    {
        $response = $this->ordercloud->exec(
            new OrdercloudRequest(
                OrdercloudRequest::METHOD_POST, "/resource/orders/organisation/{$request->getOrganisationID()}", [
                    'userId'        => $request->getUserID(),
                    'items'         => $this->formatOrderItems($request->getItems()),
                    'paymentStatus' => $request->getPaymentStatus(),
                    'deliveryType'  => $request->getDeliveryType(),
                    'amount'        => $request->getAmount(),
                    'userGeo'       => $request->getDeliveryAddressID() ? ['id' => $request->getDeliveryAddressID()] : null,
                    'access_token'  => $request->getAccessToken(),
                ]
            )
        );

        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }

    /**
     * @param array|NewOrderItem[] $items
     *
     * @return array
     */
    private function formatOrderItems(array $items)
    {
        $orderItems = [];

        foreach ($items as $item) {
            $orderItems[] = [
                'id'       => $item->getProductID(),
                'quantity' => $item->getQuantity(),
                'price'    => $item->getPrice(),
                'detail'   => [
                    'options' => $this->formatOptions($item->getOptions()),
                    'extras'  => $this->formatExtras($item->getExtras())
                ]
            ];
        }

        return $orderItems;
    }

    /**
     * @param array|NewOrderItemOption[] $options
     *
     * @return array
     */
    private function formatOptions(array $options)
    {
        $formattedOptions = [];

        foreach ($options as $option) {
            $formattedOptions[] = [
                'id'    => $option->getId(),
                'name'  => $option->getName(),
                'price' => $option->getPrice(),
            ];
        }

        return $formattedOptions;
    }

    /**
     * @param array|NewOrderItemExtra[] $extras
     *
     * @return array
     */
    private function formatExtras(array $extras)
    {
        $formattedExtras = [];

        foreach ($extras as $extra) {
            $formattedExtras[] = [
                'id'    => $extra->getId(),
                'name'  => $extra->getName(),
                'price' => $extra->getPrice(),
            ];
        }

        return $formattedExtras;
    }
}
