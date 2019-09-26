<?php

namespace Veem\converters;

use Veem\model\Amount;
use Veem\model\VeemErrorResponse;

class AmountConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $amount = new Amount();
        if (empty($response)) return $amount;
        $amount
            ->setNumber($response["number"] ?? null)
            ->setCurrency($response["currency"] ?? null);
        return $amount;
    }

    public static function convertRequest(Amount $amount = null)
    {
        if (empty($amount)) return array();
        $request = array(
            'number' => $amount->getNumber(),
            'currency' => $amount->getCurrency()
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
