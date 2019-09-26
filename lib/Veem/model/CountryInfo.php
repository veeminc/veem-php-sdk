<?php


namespace Veem\model;


class CountryInfo
{
    private $country;
    private $sendingCurrencies;
    private $receivingCurrencies;
    private $purposeOfPaymentRequired;
    private $invoiceAttachmentRequired;
    private $bankFields;
    private $purposeOfPaymentInfo;

    /**
     * Get the value of country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get the value of sendingCurrencies
     */
    public function getSendingCurrencies()
    {
        return $this->sendingCurrencies;
    }

    /**
     * Set the value of sendingCurrencies
     *
     * @return  self
     */
    public function setSendingCurrencies($sendingCurrencies)
    {
        $this->sendingCurrencies = $sendingCurrencies;
        return $this;
    }

    /**
     * Get the value of receivingCurrencies
     */
    public function getReceivingCurrencies()
    {
        return $this->receivingCurrencies;
    }

    /**
     * Set the value of receivingCurrencies
     *
     * @return  self
     */
    public function setReceivingCurrencies($receivingCurrencies)
    {
        $this->receivingCurrencies = $receivingCurrencies;
        return $this;
    }

    /**
     * Get the value of purposeOfPaymentRequired
     */
    public function getPurposeOfPaymentRequired()
    {
        return $this->purposeOfPaymentRequired;
    }

    /**
     * Set the value of purposeOfPaymentRequired
     *
     * @return  self
     */
    public function setPurposeOfPaymentRequired($purposeOfPaymentRequired)
    {
        $this->purposeOfPaymentRequired = $purposeOfPaymentRequired;
        return $this;
    }

    /**
     * Get the value of invoiceAttachmentRequired
     */
    public function getInvoiceAttachmentRequired()
    {
        return $this->invoiceAttachmentRequired;
    }

    /**
     * Set the value of invoiceAttachmentRequired
     *
     * @return  self
     */
    public function setInvoiceAttachmentRequired($invoiceAttachmentRequired)
    {
        $this->invoiceAttachmentRequired = $invoiceAttachmentRequired;
        return $this;
    }

    /**
     * Get the value of bankFields
     */
    public function getBankFields()
    {
        return $this->bankFields;
    }

    /**
     * Set the value of bankFields
     *
     * @return  self
     */
    public function setBankFields($bankFields)
    {
        $this->bankFields = $bankFields;
        return $this;
    }

    /**
     * Get the value of purposeOfPaymentInfo
     */
    public function getPurposeOfPaymentInfo()
    {
        return $this->purposeOfPaymentInfo;
    }

    /**
     * Set the value of purposeOfPaymentInfo
     *
     * @return  self
     */
    public function setPurposeOfPaymentInfo($purposeOfPaymentInfo)
    {
        $this->purposeOfPaymentInfo = $purposeOfPaymentInfo;
        return $this;
    }
}
