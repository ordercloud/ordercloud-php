<?php namespace Ordercloud\Requests\Orders\Handlers;

use Ordercloud\Entities\Orders\OrderInvoice;
use Ordercloud\Requests\Handlers\AbstractGetRequestHandler;
use Ordercloud\Requests\Orders\GetOrderInvoiceRequest;
use Ordercloud\Support\Http\Response;

class GetOrderInvoiceRequestHandler extends AbstractGetRequestHandler
{
    /**
     * @param GetOrderInvoiceRequest $request
     */
    protected function configure($request)
    {
        $this->setUrl('/resource/orders/%d/invoice', $request->getOrderId());
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    protected function transformResponse($response)
    {
        $filename = $this->getFileName($response);

        return new OrderInvoice($filename, $response->getRawResult());
    }

    /**
     * Retrieve the filename from headers.
     *
     * @param Response $response
     *
     * @return string
     */
    protected function getFileName(Response $response)
    {
        $headers = $response->getHeaders();
        $contentDisposition = isset($headers['Content-Disposition'][0]) ? $headers['Content-Disposition'][0] : null;

        if ($contentDisposition && preg_match('/filename="(.+)"/', $contentDisposition, $filename)) {
            return $filename[1];
        }

        return null;
    }
}
