<?php

namespace Veem\converters;

use Veem\model\CountryInfo;
use Veem\model\VeemErrorResponse;

class CountryInfoConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $countryInfo = new CountryInfo();
        if (empty($response)) return $countryInfo;
        $popInfos = array();
        foreach ($response["purposeOfPaymentInfo"] ?? [] as $value) {
            array_push($popInfos, PurposeOfPaymentConverter::convertResponse($value));
        }

        $countryInfo
            ->setCountry($response["country"] ?? null)
            ->setSendingCurrencies($response["sendingCurrencies"] ?? null)
            ->setReceivingCurrencies($response["receivingCurrencies"] ?? null)
            ->setPurposeOfPaymentRequired($response["purposeOfPaymentRequired"] ?? null)
            ->setInvoiceAttachmentRequired($response["invoiceAttachmentRequired"] ?? null)
            ->setBankFields($response["bankFields"] ?? null)
            ->setPurposeOfPaymentInfo($popInfos);
        return $countryInfo;
    }

}
