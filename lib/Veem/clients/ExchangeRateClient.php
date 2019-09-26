<?php

namespace Veem\clients;

use Veem\converters\ExchangeRateConverter;
use Veem\model\ExchangeRate;

class ExchangeRateClient extends BaseClient
{

    const API_URL = "/veem/v1.1/exchangerates";

    public function generate(ExchangeRate $request)
    {
        /*
            Generate exchange rate.

            @param request: an ExchangeRateRequest with from/to amount, country
                            and currency
            @return generated Fx Quote with expiry from Veem
        */
        $response = $this->postRequest(
            self::API_URL . "/quotes",
            ExchangeRateConverter::convertRequest($request));
        return ExchangeRateConverter::convertResponse($response);
    }
}
