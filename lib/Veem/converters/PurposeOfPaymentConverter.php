<?php

namespace Veem\converters;

use Veem\model\PurposeOfPayment;
use Veem\model\VeemErrorResponse;

class PurposeOfPaymentConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $purposeOfPayment = new PurposeOfPayment();
        if (empty($response)) return $purposeOfPayment;
        $purposeOfPayment
            ->setPurposeCode($response["purposeCode"] ?? null)
            ->setDescription($response["description"] ?? null);

        return $purposeOfPayment;
    }

    public static function convertRequest(PurposeOfPayment $purposeOfPayment = null)
    {
        if (empty($purposeOfPayment)) return array();
        $request = array(
            'purposeCode' => $purposeOfPayment->getPurposeCode(),
            'description' => $purposeOfPayment->getDescription(),
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
