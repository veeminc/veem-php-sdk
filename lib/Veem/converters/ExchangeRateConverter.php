<?php

namespace Veem\converters;

use Veem\model\ExchangeRate;
use Veem\model\VeemErrorResponse;

class ExchangeRateConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $exchangeRate = new ExchangeRate();
        if (empty($response)) return $exchangeRate;
        $exchangeRate
            ->setHashId($response["id"] ?? null)
            ->setFromAmount($response["fromAmount"] ?? null)
            ->setFromCurrency($response["fromCurrency"] ?? null)
            ->setFromCountry($response["fromCountry"] ?? null)
            ->setToAmount($response["toAmount"] ?? null)
            ->setToCurrency($response["toCurrency"] ?? null)
            ->setToCountry($response["toCountry"] ?? null)
            ->setRate($response["rate"] ?? null)
            ->setExpiry($response["expiry"] ?? null)
            ->setTimeCreated($response["timeCreated"] ?? null);

        return $exchangeRate;
    }

    public static function convertRequest(ExchangeRate $exchangeRate = null)
    {
        if (empty($exchangeRate)) return array();
        $request = array(
            'fromAmount' => $exchangeRate->getFromAmount(),
            'fromCurrency' => $exchangeRate->getFromCurrency(),
            'fromCountry' => $exchangeRate->getFromCountry(),
            'toAmount' => $exchangeRate->getToAmount(),
            'toCurrency' => $exchangeRate->getToCurrency(),
            'toCountry' => $exchangeRate->getToCountry()
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
