<?php namespace Ordercloud\Requests\Payments\Handlers;

use Ordercloud\Ordercloud;
use Ordercloud\Requests\OrdercloudRequest;
use Ordercloud\Requests\Payments\CreateCreditCardPayment;
use Ordercloud\Support\CommandBus\CommandHandler;
use Ordercloud\Support\Parser;

class CreateCreditCardPaymentHandler implements CommandHandler
{
    /** @var Ordercloud */
    private $ordercloud;
    /** @var Parser */
    private $parser;

    public function __construct(Ordercloud $ordercloud, Parser $parser)
    {
        $this->ordercloud = $ordercloud;
        $this->parser = $parser;
    }

    /**
     * @param CreateCreditCardPayment $request
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
