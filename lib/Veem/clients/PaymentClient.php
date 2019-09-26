<?php

namespace Veem\clients;

use Veem\converters\PaymentConverter;
use Veem\converters\PaymentListParametersConverter;
use Veem\model\Payment;
use Veem\model\PaymentListParameters;

class PaymentClient extends BaseClient
{
    const API_URL = "/veem/v1.1/payments";

    public function get($paymentId)
    {
        /*
            Get a specific payment by id

            @param request: payment id
            @return Payment that you just requested
            or ErrorResponse If the provided paymentId is invalid, or
                                  if retriving fails.
        */
        $response = $this->getRequest(self::API_URL . "/${paymentId}");
        return PaymentConverter::convertResponse($response);
    }

    public function create(Payment $payment)
    {
        /*
            Create a Payment

            @param request: a PaymentRequest
            @return Payment that you just requested
            or ErrorResponse If the provided PaymentRequest is invalid, or
                                  if creation fails.
        */
        $response = $this->postRequest(
            self::API_URL,
            PaymentConverter::convertRequest($payment)
        );
        return PaymentConverter::convertResponse($response);
    }

    public function send($paymentId)
    {
        /*
            Send a specific payment by id

            @param request: payment id
            @return Payment that you just requested
            or ErrorResponse If the provided paymentId is invalid, or
                                  if sending fails.
        */
        $response = $this->postRequest(self::API_URL . "/${paymentId}/approve");
        return PaymentConverter::convertResponse($response);
    }

    public function cancel($paymentId)
    {
        /*
            Cancel a specific payment by id

            @param request: payment id
            @return Payment that you just requested
            or ErrorResponse If the provided paymentId is invalid, or
                                  if cancelling fails.
        */
        $response = $this->postRequest(self::API_URL . "/${paymentId}/cancel");
        return PaymentConverter::convertResponse($response);
    }

    public function list(PaymentListParameters $parameters = null)
    {
        /*
            Get all payments in pagination format

            @param request: a PaymentListParameters or customize dictionary with
                            listing criteria
            @return paginated Payments for your account
        */
        $response = $this->getRequest(
            self::API_URL,
            PaymentListParametersConverter::convertRequest($parameters)
        );
        $content = array();
        foreach ($response["content"] ?? [] as $value) {
            array_push($content, PaymentConverter::convertResponse($value));
        }
        return PaymentConverter::convertPageResponse($response, $content);
    }
}
