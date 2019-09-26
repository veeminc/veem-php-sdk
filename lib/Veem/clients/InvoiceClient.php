<?php

namespace Veem\clients;

use Veem\converters\InvoiceConverter;
use Veem\model\Invoice;

class InvoiceClient extends BaseClient
{
    const API_URL = "/veem/v1.1/invoices";

    public function get($invoiceId)
    {
        /*
            Get a specific invoice by id

            @param request: invoice id
            @return Invoice that you just requested
            or ErrorResponse If the provided invoiceId is invalid, or
                                  if retriving fails.
        */
        $response = $this->getRequest(self::API_URL . "/${invoiceId}");
        return InvoiceConverter::convertResponse($response);
    }

    public function create(Invoice $invoice)
    {
        /*
            Create an Invoice

            @param request: an InvoiceRequest
            @return Invoice that you just requested
            or ErrorResponse If the provided InvoiceRequest is invalid, or
                                  if creation fails.
        */
        $response = $this->postRequest(
            self::API_URL,
            InvoiceConverter::convertRequest($invoice));
        return InvoiceConverter::convertResponse($response);
    }

    public function send($invoiceId)
    {
        /*
            Send a specific invoice by id

            @param request: invoice id
            @return Invoice that you just requested
            or ErrorResponse If the provided invoiceId is invalid, or
                                  if sending fails.
        */
        $response = $this->postRequest(self::API_URL . "/${invoiceId}/approve");
        return InvoiceConverter::convertResponse($response);
    }

    public function cancel($invoiceId)
    {
        /*
            Cancel a specific invoice by id

            @param request: invoice id
            @return Invoice that you just requested
            or ErrorResponse If the provided invoiceId is invalid, or
                                  if cancelling fails.
        */
        $response = $this->postRequest(self::API_URL . "/${invoiceId}/cancel");
        return InvoiceConverter::convertResponse($response);
    }
}
