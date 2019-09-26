<?php

namespace Veem\clients;

use Veem\converters\CountryInfoConverter;

class MetadataClient extends BaseClient
{
    public function getCountryCurrencyMap()
    {
        /*
            Get all supported country and currency map
        */
        $responses = $this->getRequest("/veem/public/v1.1/country-currency-map");
        $content = array();
        foreach ($responses ?? [] as $value) {
            array_push($content, CountryInfoConverter::convertResponse($value));
        }
        return $content;
    }
}
