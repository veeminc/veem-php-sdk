<?php

namespace Veem\converters;

use Veem\model\PushPaymentInfo;
use Veem\model\VeemErrorResponse;

class PushPaymentInfoConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $pushPaymentInfo = new PushPaymentInfo();
        if (empty($response))   return $pushPaymentInfo;
        $pushPaymentInfo
            ->setAmount($response["amount"] ?? null)
            ->setReference($response["reference"] ?? null)
            ->setPushPaymentInfo($response["pushPaymentInfo"] ?? null);

        return $pushPaymentInfo;
    }

}
