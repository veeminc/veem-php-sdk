<?php


namespace Veem\converters;


use Veem\model\Account;
use Veem\model\VeemErrorResponse;

class AccountConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $account = new Account();
        if (empty($response)) return $account;
        $account
            ->setId($response["id"] ?? -1)
            ->setName($response["name"] ?? null)
            ->setType($response["type"] ?? null)
            ->setEmail($response["email"] ?? null)
            ->setFirstName($response["firstName"] ?? null)
            ->setLastName($response["lastName"] ?? null)
            ->setBusinessName($response["businessName"] ?? null)
            ->setCountryCode($response["countryCode"] ?? null)
            ->setPhoneCountryCode($response["phoneCountryCode"] ?? null)
            ->setPhone($response["phone"] ?? null)
            ->setIsContact($response["isContact"] ?? false);
        return $account;
    }

    public static function convertRequest(Account $account = null)
    {
        if (empty($account)) return array();
        $request = array(
            'id' => $account->getId(),
            'name' => $account->getName(),
            'type' => $account->getType(),
            'email' => $account->getEmail(),
            'firstName' => $account->getFirstName(),
            'lastName' => $account->getLastName(),
            'businessName' => $account->getBusinessName(),
            'countryCode' => $account->getCountryCode(),
            'phoneCountryCode' => $account->getPhoneCountryCode(),
            'phone' => $account->getPhone(),
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
