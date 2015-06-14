<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Requests\Handlers\AbstractPostRequestHandler;
use Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest;

class CreateCreditCardPaymentRequestHandler extends AbstractPostRequestHandler
{
    /**
     * @param CreateCreditCardPaymentRequest $request
     */
    protected function configure($request)
    {
        $this->url = sprintf("/resource/orders/%d/pay/creditcard/%s", $request->getOrderID(), $request->getPaymentGateway());

        $creditCard = $request->getCard();
        $this->parameters = [
            'amount'          => $request->getAmount(),
            'budgetPeriod'    => $request->getBudgetPeriod(),
            'cardExpiryMonth' => $creditCard->getExpiryMonth(),
            'cardExpiryYear'  => $creditCard->getExpiryYear(),
            'nameOnCard'      => $creditCard->getNameOnCard(),
            'cvv'             => $creditCard->getCvv(),
            'cardNumber'      => $creditCard->getCardNumber(),
        ];
    }

    protected function transformResponse($response)
    {
        return $response; //TODO
    }
}
