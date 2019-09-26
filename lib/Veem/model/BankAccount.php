<?php


namespace Veem\model;


class BankAccount
{
    private $routingNumber;
    private $bankName;
    private $bankAccountNumber;
    private $currencyCode;
    private $isoCountryCode;
    private $iban;
    private $swiftBic;
    private $beneficiaryName;
    private $bsbBankCode;
    private $branchCode;
    private $transitCode;
    private $bankInstitutionNumber;
    private $bankIfscBranchCode;
    private $sortCode;
    private $bankCode;
    private $clabe;
    private $bankCnaps;
    private $bankAddress;

    /**
     * Get the value of routingNumber
     */
    public function getRoutingNumber()
    {
        return $this->routingNumber;
    }

    /**
     * Set the value of routingNumber
     *
     * @return  self
     */
    public function setRoutingNumber($routingNumber)
    {
        $this->routingNumber = $routingNumber;
        return $this;
    }

    /**
     * Get the value of bankName
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * Set the value of bankName
     *
     * @return  self
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
        return $this;
    }

    /**
     * Get the value of bankAccountNumber
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    /**
     * Set the value of bankAccountNumber
     *
     * @return  self
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;
        return $this;
    }

    /**
     * Get the value of currencyCode
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set the value of currencyCode
     *
     * @return  self
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Get the value of isoCountryCode
     */
    public function getIsoCountryCode()
    {
        return $this->isoCountryCode;
    }

    /**
     * Set the value of isoCountryCode
     *
     * @return  self
     */
    public function setIsoCountryCode($isoCountryCode)
    {
        $this->isoCountryCode = $isoCountryCode;
        return $this;
    }

    /**
     * Get the value of iban
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set the value of iban
     *
     * @return  self
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
        return $this;
    }

    /**
     * Get the value of swiftBic
     */
    public function getSwiftBic()
    {
        return $this->swiftBic;
    }

    /**
     * Set the value of swiftBic
     *
     * @return  self
     */
    public function setSwiftBic($swiftBic)
    {
        $this->swiftBic = $swiftBic;
        return $this;
    }

    /**
     * Get the value of beneficiaryName
     */
    public function getBeneficiaryName()
    {
        return $this->beneficiaryName;
    }

    /**
     * Set the value of beneficiaryName
     *
     * @return  self
     */
    public function setBeneficiaryName($beneficiaryName)
    {
        $this->beneficiaryName = $beneficiaryName;
        return $this;
    }

    /**
     * Get the value of bsbBankCode
     */
    public function getBsbBankCode()
    {
        return $this->bsbBankCode;
    }

    /**
     * Set the value of bsbBankCode
     *
     * @return  self
     */
    public function setBsbBankCode($bsbBankCode)
    {
        $this->bsbBankCode = $bsbBankCode;
        return $this;
    }

    /**
     * Get the value of branchCode
     */
    public function getBranchCode()
    {
        return $this->branchCode;
    }

    /**
     * Set the value of branchCode
     *
     * @return  self
     */
    public function setBranchCode($branchCode)
    {
        $this->branchCode = $branchCode;
        return $this;
    }

    /**
     * Get the value of transitCode
     */
    public function getTransitCode()
    {
        return $this->transitCode;
    }

    /**
     * Set the value of transitCode
     *
     * @return  self
     */
    public function setTransitCode($transitCode)
    {
        $this->transitCode = $transitCode;
        return $this;
    }

    /**
     * Get the value of bankInstitutionNumber
     */
    public function getBankInstitutionNumber()
    {
        return $this->bankInstitutionNumber;
    }

    /**
     * Set the value of bankInstitutionNumber
     *
     * @return  self
     */
    public function setBankInstitutionNumber($bankInstitutionNumber)
    {
        $this->bankInstitutionNumber = $bankInstitutionNumber;
        return $this;
    }

    /**
     * Get the value of bankIfscBranchCode
     */
    public function getBankIfscBranchCode()
    {
        return $this->bankIfscBranchCode;
    }

    /**
     * Set the value of bankIfscBranchCode
     *
     * @return  self
     */
    public function setBankIfscBranchCode($bankIfscBranchCode)
    {
        $this->bankIfscBranchCode = $bankIfscBranchCode;
        return $this;
    }

    /**
     * Get the value of sortCode
     */
    public function getSortCode()
    {
        return $this->sortCode;
    }

    /**
     * Set the value of sortCode
     *
     * @return  self
     */
    public function setSortCode($sortCode)
    {
        $this->sortCode = $sortCode;
        return $this;
    }

    /**
     * Get the value of bankCode
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * Set the value of bankCode
     *
     * @return  self
     */
    public function setBankCode($bankCode)
    {
        $this->bankCode = $bankCode;
        return $this;
    }

    /**
     * Get the value of clabe
     */
    public function getClabe()
    {
        return $this->clabe;
    }

    /**
     * Set the value of clabe
     *
     * @return  self
     */
    public function setClabe($clabe)
    {
        $this->clabe = $clabe;
        return $this;
    }

    /**
     * Get the value of bankCnaps
     */
    public function getBankCnaps()
    {
        return $this->bankCnaps;
    }

    /**
     * Set the value of bankCnaps
     *
     * @return  self
     */
    public function setBankCnaps($bankCnaps)
    {
        $this->bankCnaps = $bankCnaps;
        return $this;
    }

    /**
     * Get the value of bankAddress
     */
    public function getBankAddress()
    {
        return $this->bankAddress;
    }

    /**
     * Set the value of bankAddress
     *
     * @return  self
     */
    public function setBankAddress($bankAddress)
    {
        $this->bankAddress = $bankAddress;
        return $this;
    }
}
