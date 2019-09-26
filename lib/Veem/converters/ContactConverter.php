<?php

namespace Veem\converters;

use Veem\model\Contact;
use Veem\model\VeemErrorResponse;


class ContactConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $contact = new Contact();
        if (empty($response))   return $contact;
        $contact
            ->setId($response["id"] ?? null)
            ->setExternalId($response["externalBusinessId"] ?? null)
            ->setContactAccountId($response["contactAccountId"] ?? null)
            ->setEmail($response["email"] ?? null)
            ->setFirstName($response["firstName"] ?? null)
            ->setLastName($response["lastName"] ?? null)
            ->setBusinessName($response["businessName"] ?? null)
            ->setCountryCode($response["isoCountryCode"] ?? null)
            ->setDialCode($response["phoneDialCode"] ?? null)
            ->setPhoneNumber($response["phoneNumber"] ?? null)
            ->setBatchItemId($response["batchItemId"] ?? null)
            ->setType($response["type"] ?? null)
            ->setBankAccount(BankAccountConverter::convertResponse(
                $response["bankAccount"] ?? null))
            ->setAddress(AddressConverter::convertResponse($response["businessAddress"] ?? null));
        return $contact;
    }

    public static function convertRequest(Contact $contact = null)
    {
        if (empty($contact)) return array();
        $request = array(
            'email' => $contact->getEmail(),
            'type' => $contact->getType(),
            'firstName' => $contact->getFirstName(),
            'lastName' => $contact->getLastName(),
            'businessName' => $contact->getBusinessName(),
            'isoCountryCode' => $contact->getCountryCode(),
            'phoneDialCode' => $contact->getDialCode(),
            'phoneNumber' => $contact->getPhoneNumber(),
            'externalBusinessId' => $contact->getExternalId(),
            'batchItemId' => $contact->getBatchItemId(),
            'bankAccount' => BankAccountConverter::convertRequest($contact->getBankAccount()),
            'businessAddress' => AddressConverter::convertRequest($contact->getAddress())
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
