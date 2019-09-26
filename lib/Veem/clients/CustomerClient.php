<?php

namespace Veem\clients;

use Veem\converters\AccountConverter;
use Veem\converters\AccountListParametersConverter;

use Veem\model\AccountListParameters;

class CustomerClient extends BaseClient
{

    const API_URL = "/veem/v1.1/customers";

    public function list(AccountListParameters $request)
    {
        /*
            Matching Veem customer email with provided email address

            @param request: an AccountRequest or stirng of email
            @return paginated Accounts that matches the search criteria.
        */
        $response = $this->getRequest(
          self::API_URL,
          AccountListParametersConverter::convertRequest($request)
        );

        $content = array();
        foreach ($response["content"] ?? [] as $value) {
            array_push($content, AccountConverter::convertResponse($value));
        }
        return AccountConverter::convertPageResponse($response, $content);
    }

}
