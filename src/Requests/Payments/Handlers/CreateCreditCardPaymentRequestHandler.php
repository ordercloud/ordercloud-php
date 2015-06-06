<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Payments\CreateCreditCardPaymentRequest;
use Ordercloud\Support\CommandBus\CommandHandler;

class CreateCreditCardPaymentRequestHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;

    public function __construct(Ordercloud $ordercloud)
    {
        $this->ordercloud = $ordercloud;
    }

    /**
     * @param CreateCreditCardPaymentRequest $request
     */
    public function handle($request)
    {
        $orderID = $request->getOrderID();
        $paymentGateway = $request->getPaymentGateway();
        $creditCard = $request->getCard();

        $this->ordercloud->exec(new OrdercloudRequest(
            OrdercloudRequest::METHOD_POST,
            "/resource/orders/{$orderID}/pay/creditcard/{$paymentGateway}",
            [
                'amount'          => $request->getAmount(),
                'budgetPeriod'    => $request->getBudgetPeriod(),
                'cardExpiryMonth' => $creditCard->getExpiryMonth(),
                'cardExpiryYear'  => $creditCard->getExpiryYear(),
                'nameOnCard'      => $creditCard->getNameOnCard(),
                'cvv'             => $creditCard->getCvv(),
                'cardNumber'      => $creditCard->getCardNumber(),
                'orderRef'        => $request->getOrderRef(),
                'description'     => $request->getDescription(),
                'destinationRef'  => $request->getDestinationRef(),
                'testMode'        => $request->isTestMode(),
                'access_token'    => $request->getAccessToken(),
            ]
        ));
    }
}
