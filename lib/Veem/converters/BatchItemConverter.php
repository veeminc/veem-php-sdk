<?php

namespace Veem\converters;

use Veem\model\BatchItem;
use Veem\model\VeemErrorResponse;

class BatchItemConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $batchItem = new BatchItem();
        if (empty($response))   return $batchItem;
        $batchItem
            ->setId($response["id"] ?? null)
            ->setBatchItemId($response["batchItemId"] ?? null)
            ->setStatus($response["status"] ?? null)
            ->setErrorInfo($response["errorInfo"] ?? null)
            ->setPaymentId($response["paymentId"] ?? null)
            ->setContactId($response["contactId"] ?? null)
            ->setType($response["type"] ?? null);
        return $batchItem;
    }

}
