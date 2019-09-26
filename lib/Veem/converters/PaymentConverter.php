<?php

namespace Veem\converters;

use Veem\model\Payment;
use Veem\model\VeemErrorResponse;

class PaymentConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $payment = new Payment();
        if (empty($response))   return $payment;
        $attachments = array();
        foreach (($response["attachments"] ?? []) as $value) {
            array_push($attachments, AttachmentConverter::convertResponse($value));
        }

        $payment
            ->setId($response["id"] ?? null)
            ->setStatus($response["status"] ?? null)
            ->setExchangeRate(ExchangeRateConverter::convertResponse(
                $response["exchangeRate"] ?? ($response["exchangeRateResponse"] ?? null)))
            ->setTimeCreated($response["timeCreated"] ?? null)
            ->setClaimLink($response["claimLink"] ?? null)
            ->setPushPaymentInfo(PushPaymentInfoConverter::convertResponse(
                $response["pushPaymentInfo"] ?? ($response["pushPaymentInfoResponse"] ?? null)))
            ->setPaymentApproval(PaymentApprovalConverter::convertResponse(
                $response["paymentApproval"] ?? ($response["paymentApprovalResponse"] ?? null)))
            ->setBatchItemId($response["batchItemId"] ?? null)
            ->setPayee(AccountConverter::convertResponse($response["payee"] ?? null))
            ->setPayer(AccountConverter::convertResponse($response["payer"] ?? null))
            ->setClientId($response["clientId"] ?? null)
            ->setAmount(AmountConverter::convertResponse(
                $response["amount"] ?? ($response["payeeAmount"] ?? null)))
            ->setNotes($response["notes"] ?? null)
            ->setExternalInvoiceRefId($response["externalInvoiceRefId"] ?? null)
            ->setCcEmails($response["ccEmails"] ?? [])
            ->setPurposeOfPayment($response["purposeOfPayment"] ?? null)
            ->setAttachments($attachments)
            ->setExchangeRateQuoteId($response["exchangeRateQuoteId"] ?? null);

        return $payment;
    }

    public static function convertRequest(Payment $payment = null)
    {
        if (empty($payment)) return array();
        $attachments = array();
        foreach (($payment->getAttachments() ?? []) as $value) {
            array_push($attachments, AttachmentConverter::convertRequest($value));
        }
        $request = array(
            'batchItemId' => $payment->getBatchItemId(),
            'exchangeRateQuoteId' => $payment->getExchangeRateQuoteId(),
            'amount' => AmountConverter::convertRequest($payment->getAmount()),
            'payee' => AccountConverter::convertRequest($payment->getPayee()),
            'notes' => $payment->getNotes(),
            'ccEmails' => $payment->getCcEmails(),
            'externalInvoiceRefId' => $payment->getExternalInvoiceRefId(),
            'purposeOfPayment' => $payment->getPurposeOfPayment(),
            'attachments' => $attachments,
            'approveAutomatically' => $payment->getApproveAutomatically(),
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
