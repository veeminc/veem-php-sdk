<?php

namespace Veem\converters;

use Veem\model\BankAccount;
use Veem\model\VeemErrorResponse;

class BankAccountConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $bankAccount = new BankAccount();
        if (empty($response))   return $bankAccount;
        $bankAccount
            ->setRoutingNumber($response["routingNumber"] ?? null)
            ->setBankName($response["bankName"] ?? null)
            ->setBankAccountNumber($response["bankAccountNumber"] ?? null)
            ->setCurrencyCode($response["currencyCode"] ?? null)
            ->setIsoCountryCode($response["isoCountryCode"] ?? null)
            ->setIban($response["iban"] ?? null)
            ->setSwiftBic($response["swiftBic"] ?? null)
            ->setBeneficiaryName($response["beneficiaryName"] ?? null)
            ->setBsbBankCode($response["bsbBankCode"] ?? null)
            ->setBranchCode($response["branchCode"] ?? null)
            ->setTransitCode($response["transitCode"] ?? null)
            ->setBankInstitutionNumber($response["bankInstitutionNumber"] ?? null)
            ->setBankIfscBranchCode($response["bankIfscBranchCode"] ?? null)
            ->setSortCode($response["sortCode"] ?? null)
            ->setBankCode($response["bankCode"] ?? null)
            ->setClabe($response["clabe"] ?? null)
            ->setBankCnaps($response["bankCnaps"] ?? null)
            ->setBankAddress(AddressConverter::convertResponse(
                $response["bankAddress"] ?? null));
        return $bankAccount;
    }

    public static function convertRequest(BankAccount $bankAccount = null)
    {
        if (empty($bankAccount)) return null;
        $request = array(
            'routingNumber' => $bankAccount->getRoutingNumber(),
            'bankName' => $bankAccount->getBankName(),
            'bankAccountNumber' => $bankAccount->getBankAccountNumber(),
            'currencyCode' => $bankAccount->getCurrencyCode(),
            'isoCountryCode' => $bankAccount->getIsoCountryCode(),
            'iban' => $bankAccount->getIban(),
            'swiftBic' => $bankAccount->getSwiftBic(),
            'beneficiaryName' => $bankAccount->getBeneficiaryName(),
            'bsbBankCode' => $bankAccount->getBsbBankCode(),
            'branchCode' => $bankAccount->getBranchCode(),
            'transitCode' => $bankAccount->getTransitCode(),
            'bankInstitutionNumber' => $bankAccount->getBankInstitutionNumber(),
            'bankIfscBranchCode' => $bankAccount->getBankIfscBranchCode(),
            'sortCode' => $bankAccount->getSortCode(),
            'bankCode' => $bankAccount->getBankCode(),
            'clabe' => $bankAccount->getClabe(),
            'bankCnaps' => $bankAccount->getBankCnaps(),
            'bankAddress' => AddressConverter::convertRequest($bankAccount->getBankAddress())
        );
        return array_filter($request, function ($v) {
            return !is_null($v);
        });
    }
}
