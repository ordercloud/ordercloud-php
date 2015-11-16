<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest;
use Ordercloud\Support\Reflection\EntityReflector;

class CreateCreditCardPaymentRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreateCreditCardPaymentRequest $request
     */
    protected function configure($request)
    {
        $creditCard = $request->getCard();

        $this->setUrl('/resource/orders/%d/pay/creditcard/%s', $request->getOrderID(), $request->getPaymentGateway())
            ->setBodyParameters([
                'budgetPeriod'    => $request->getBudgetPeriod(),
                'cardExpiryMonth' => $creditCard->getExpiryMonth(),
                'cardExpiryYear'  => $creditCard->getExpiryYear(),
                'nameOnCard'      => $creditCard->getNameOnCard(),
                'cvv'             => $creditCard->getCvv(),
                'cardNumber'      => $creditCard->getCardNumber(),
                'threeDSecure'    => $request->isThreeDSecure(),
            ]);
    }

    protected function transformResponse($response)
    {
        return EntityReflector::parseResourceIDFromURL($response->getUrl());
    }
}
