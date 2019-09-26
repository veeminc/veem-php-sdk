<?php

namespace Veem\converters;

use Veem\model\Page;
use Veem\model\VeemErrorResponse;

class BaseConverter
{
    public static function convertPageResponse($response, $content=null)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $page = new Page();
        if (empty($response)) return $page;
        $page
            ->setNumber($response["number"] ?? 0)
            ->setSize($response["size"] ?? 0)
            ->setTotalPages($response["totalPages"] ?? 0)
            ->setNumberOfElements($response["numberOfElements"] ?? 0)
            ->setTotalElements($response["totalElements"] ?? 0)
            ->setPreviousPage($response["previousPage"] ?? null)
            ->setNextPage($response["nextPage"] ?? null)
            ->setFirst($response["first"] ?? null)
            ->setLast($response["last"] ?? null)
            ->setContent(($content) ?? array());
        return $page;
    }
}
