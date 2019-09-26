<?php

namespace Veem\converters;

use Veem\model\VeemErrorResponse;

class VeemErrorResponseConverter extends BaseConverter
{
    public static function get_element_by_ikey($needle, $haystack)
    {
        foreach ($haystack as $key => $meh) {
            if (strtolower($needle) == strtolower($key)) {
                return $haystack[(string)$key];
            }
        }
        return null;
    }
    public static function convertResponse($response)
    {
        $error = new VeemErrorResponse();
        if (empty($response)) return $error;
        $error
            ->setMessage(self::get_element_by_ikey("message", $response) )
            ->setCode(self::get_element_by_ikey("code", $response))
            ->setLogTag(self::get_element_by_ikey("logTag", $response))
            ->setTimestamp(self::get_element_by_ikey("timestamp", $response))
            ->setFileName(self::get_element_by_ikey("fileName", $response))
            ->setLineNumber(self::get_element_by_ikey("lineNumber", $response));

        return $error;
    }
}
