<?php

namespace Veem\converters;

use Veem\model\Address;
use Veem\model\VeemErrorResponse;

class AddressConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $address = new Address();
        if (empty($response))   return $address;
        $address
            ->setLine1($response["line1"] ?? null)
            ->setLine2($response["line2"] ?? null)
            ->setCity($response["city"] ?? null)
            ->setStateProvince($response["stateProvince"] ?? null)
            ->setPostalCode($response["postalCode"] ?? null);
        return $address;
    }

    public static function convertRequest(Address $address = null)
    {
        if (empty($address)) return null;
        $request = array(
            'line1' => $address->getLine1(),
            'line2' => $address->getLine2(),
            'city' => $address->getCity(),
            'stateProvince' => $address->getStateProvince(),
            'postalCode' => $address->getPostalCode()
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
