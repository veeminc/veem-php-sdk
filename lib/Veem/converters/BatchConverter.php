<?php

namespace Veem\converters;

use Veem\model\Batch;
use Veem\model\VeemErrorResponse;

class BatchConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $batch = new Batch();
        if (empty($response))   return $batch;
        $batch
            ->setId($response["id"] ?? null)
            ->setBatchId($response["batchId"] ?? null)
            ->setStatus($response["status"] ?? null)
            ->setHasErrors($response["hasErrors"] ?? null)
            ->setProcessedItems($response["processedItems"] ?? [])
            ->setTotalItems($response["totalItems"] ?? null)
            ->setBatchItems($response["batchItems"] ?? []);
        return $batch;
    }

    public static function convertRequest(Batch $batch = null)
    {
        if (empty($batch)) return array();

        $items = array();
        foreach ($batch->getBatchItems() ?? [] as $value) {
            array_push($items, ContactConverter::convertRequest($value));
        }
        return $items;
    }
}
