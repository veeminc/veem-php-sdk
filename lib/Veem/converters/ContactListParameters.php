<?php

namespace Veem\converters;

use Veem\model\ContactListParameters;

class ContactListParametersConverter extends BaseConverter
{
    public static function convertRequest(ContactListParameters $parameters = null)
    {
        if (empty($parameters)) return array();
        $request = array(
            'email' => $parameters->getEmail(),
            'firstName' => $parameters->getFirstName(),
            'lastName' => $parameters->getLastName(),
            'businessName' => $parameters->getBusinessName(),
            'batchId' => $parameters->getBatchId(),
            'batchItemIds' => $parameters->getBatchItemIds(),
            'pageNumber' => $parameters->getPageNumber(),
            'pageSize' => $parameters->getPageSize()
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
