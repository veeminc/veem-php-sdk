<?php

namespace Veem\converters;

use Veem\model\Invoice;
use Veem\model\VeemErrorResponse;

class InvoiceConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $invoice = new Invoice();
        if (empty($response)) return $invoice;
        $attachments = array();
        foreach ($response["attachments"] ?? [] as $value) {
            array_push($attachments, AttachmentConverter::convertResponse($value));
        }

        $invoice
            ->setId($response["id"] ?? null)
            ->setStatus($response["status"] ?? null)
            ->setExchangeRate(ExchangeRateConverter::convertResponse($response["exchangeRate"] ?? null))
            ->setTimeCreated($response["timeCreated"] ?? null)
            ->setClaimLink($response["claimLink"] ?? null)
            ->setPayer(AccountConverter::convertResponse($response["payer"] ?? null))
            ->setClientId($response["clientId"] ?? null)
            ->setAmount(AmountConverter::convertResponse($response["amount"] ?? null))
            ->setNotes($response["notes"] ?? null)
            ->setExternalInvoiceRefId($response["externalInvoiceRefId"] ?? null)
            ->setCcEmails($response["ccEmails"] ?? null)
            ->setPurposeOfPayment($response["purposeOfPayment"] ?? null)
            ->setAttachments($attachments)
            ->setExchangeRateQuoteId($response["exchangeRateQuoteId"] ?? null)
            ->setDueDate($response["dueDate"] ?? null);

        return $invoice;
    }

    public static function convertRequest(Invoice $invoice = null)
    {
        if (empty($invoice)) return array();
        $attachments = array();
        foreach (($invoice->getAttachments() ?? []) as $value) {
            array_push($attachments, AttachmentConverter::convertRequest($value));
        }
        $request = array(
            'id' => $invoice->getId(),
            'status' => $invoice->getStatus(),
            'timeCreated' => $invoice->getTimeCreated(),
            'claimLink' => $invoice->getClaimLink(),
            'clientId' => $invoice->getClientId(),
            'exchangeRateQuoteId' => $invoice->getExchangeRateQuoteId(),
            'externalInvoiceRefId' => $invoice->getExternalInvoiceRefId(),
            'amount' => AmountConverter::convertRequest($invoice->getAmount()),
            'payer' => AccountConverter::convertRequest($invoice->getPayer()),
            'notes' => $invoice->getNotes(),
            'ccEmails' => $invoice->getCcEmails(),
            'purposeOfPayment' => $invoice->getPurposeOfPayment(),
            'attachments' => $attachments,
            'dueDate' => $invoice->getDueDate(),
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
