<?php

namespace Veem\converters;

use Veem\model\Approver;
use Veem\model\VeemErrorResponse;

class ApproverConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $approver = new Approver();
        if (empty($response))   return $approver;
        $approver
            ->setStatus($response["status"] ?? null)
            ->setEmail($response["email"] ?? null)
            ->setFirstName($response["firstName"] ?? null)
            ->setLastName($response["lastName"] ?? null)
            ->setMiddleName($response["middleName"] ?? null);
        return $approver;
    }

}
