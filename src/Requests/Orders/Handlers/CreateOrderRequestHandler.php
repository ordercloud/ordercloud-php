<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Orders\CreateOrderRequest;
use Ordercloud\Requests\Orders\Entities\NewOrderItem;
use Ordercloud\Requests\Orders\Entities\NewOrderItemExtra;
use Ordercloud\Requests\Orders\Entities\NewOrderItemOption;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateOrderRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreateOrderRequest $request
     */
    protected function configure($request)
    {
        $this->url = "/resource/orders/organisation/{$request->getOrganisationID()}";

        $this->parameters = [
            'userId'        => $request->getUserID(),
            'items'         => $this->formatOrderItems($request->getItems()),
            'paymentStatus' => $request->getPaymentStatus(),
            'deliveryType'  => $request->getDeliveryType(),
            'amount'        => $request->getAmount(),
            'userGeo'       => $request->getDeliveryAddressID() ? ['id' => $request->getDeliveryAddressID()] : null,
            'access_token'  => $request->getAccessToken(),
        ];
    }

    protected function transformResponse($response)
    {
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
