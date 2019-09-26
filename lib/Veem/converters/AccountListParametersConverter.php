<?php

namespace Veem\converters;

use Veem\model\AccountListParameters;

class AccountListParametersConverter extends BaseConverter
{
    public static function convertRequest(AccountListParameters $parameters = null)
    {
        if (empty($parameters)) return array();
        $request = array(
            'email' => $parameters->getEmail()
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
