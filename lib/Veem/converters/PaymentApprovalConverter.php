<?php

namespace Veem\converters;

use Veem\model\PaymentApproval;
use Veem\model\VeemErrorResponse;

class PaymentApprovalConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $paymentApproval = new PaymentApproval();
        if (empty($response))   return $paymentApproval;
        $paymentApproval
            ->setStatus($response["status"] ?? null)
            ->setApproversCompleted($response["approversCompleted"] ?? null)
            ->setApproversRequired($response["approversRequired"] ?? null)
            ->setApprovers($response["approvers"] ?? null);

        return $paymentApproval;
    }

    public static function convertRequest(PaymentApproval $paymentApproval = null)
    {
        if (empty($paymentApproval)) return array();
        $request = array(
            'status' => $paymentApproval->getStatus(),
            'approvers' => $paymentApproval->getApprovers(),
            'approversCompleted' => $paymentApproval->getApproversCompleted(),
            'approversRequired' => $paymentApproval->getApproversRequired(),
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
