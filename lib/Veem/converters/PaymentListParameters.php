<?php

namespace Veem\converters;

use Veem\model\PaymentListParameters;

class PaymentListParametersConverter extends BaseConverter
{
    public static function convertRequest(PaymentListParameters $parameters = null)
    {
        if (empty($parameters)) return array();
        $request = array(
            'direction' => $parameters->getDirection(),
            'paymentIds' => $parameters->getPaymentIds(),
            'status' => $parameters->getStatus(),
            'sortParameters' => $parameters->getSortParameters(),
            'pageNumber' => $parameters->getPageNumber(),
            'pageSize' => $parameters->getPageSize()
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
