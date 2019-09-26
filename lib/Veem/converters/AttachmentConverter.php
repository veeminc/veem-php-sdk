<?php

namespace Veem\converters;

use Veem\model\Attachment;
use Veem\model\VeemErrorResponse;

class AttachmentConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $attachment = new Attachment();
        if (empty($response))   return $attachment;
        $attachment
            ->setType($response["type"] ?? null)
            ->setName($response["name"] ?? null)
            ->setReferenceId($response["referenceId"] ?? null)
            ->setPath($response["path"] ?? null);
        return $attachment;
    }

    public static function convertRequest(Attachment $attachment = null)
    {
        if (empty($attachment)) return array();
        $request = array(
            'type' => $attachment->getType(),
            'name' => $attachment->getName(),
            'referenceId' => $attachment->getReferenceId(),
            'path' => $attachment->getPath()
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
