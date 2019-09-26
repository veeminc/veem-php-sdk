<?php


namespace Veem\model;


class Payment
{
    private $id;
    private $status;
    private $exchangeRate;
    private $timeCreated;
    private $claimLink;
    private $pushPaymentInfo;
    private $paymentApproval;
    private $batchItemId;
    private $payee;
    private $payer;
    private $clientId;
    private $amount;
    private $notes;
    private $externalInvoiceRefId;
    private $ccEmails;
    private $purposeOfPayment;
    private $attachments;
    private $exchangeRateQuoteId;
    private $approveAutomatically;

    public function __toString()
    {
        return
            "Payment(id: " . $this->getId() . ", status: " . $this->getStatus() . ")";
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the value of exchangeRate
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * Set the value of exchangeRate
     *
     * @return  self
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
        return $this;
    }

    /**
     * Get the value of timeCreated
     */
    public function getTimeCreated()
    {
        return $this->timeCreated;
    }

    /**
     * Set the value of timeCreated
     *
     * @return  self
     */
    public function setTimeCreated($timeCreated)
    {
        $this->timeCreated = $timeCreated;
        return $this;
    }

    /**
     * Get the value of claimLink
     */
    public function getClaimLink()
    {
        return $this->claimLink;
    }

    /**
     * Set the value of claimLink
     *
     * @return  self
     */
    public function setClaimLink($claimLink)
    {
        $this->claimLink = $claimLink;
        return $this;
    }

    /**
     * Get the value of pushPaymentInfo
     */
    public function getPushPaymentInfo()
    {
        return $this->pushPaymentInfo;
    }

    /**
     * Set the value of pushPaymentInfo
     *
     * @return  self
     */
    public function setPushPaymentInfo($pushPaymentInfo)
    {
        $this->pushPaymentInfo = $pushPaymentInfo;
        return $this;
    }

    /**
     * Get the value of paymentApproval
     */
    public function getPaymentApproval()
    {
        return $this->paymentApproval;
    }

    /**
     * Set the value of paymentApproval
     *
     * @return  self
     */
    public function setPaymentApproval($paymentApproval)
    {
        $this->paymentApproval = $paymentApproval;
        return $this;
    }

    /**
     * Get the value of batchItemId
     */
    public function getBatchItemId()
    {
        return $this->batchItemId;
    }

    /**
     * Set the value of batchItemId
     *
     * @return  self
     */
    public function setBatchItemId($batchItemId)
    {
        $this->batchItemId = $batchItemId;
        return $this;
    }

    /**
     * Get the value of payee
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * Set the value of payee
     *
     * @return  self
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;
        return $this;
    }

    /**
     * Get the value of payer
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Set the value of payer
     *
     * @return  self
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;
        return $this;
    }

    /**
     * Get the value of clientId
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set the value of clientId
     *
     * @return  self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get the value of notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set the value of notes
     *
     * @return  self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * Get the value of externalInvoiceRefId
     */
    public function getExternalInvoiceRefId()
    {
        return $this->externalInvoiceRefId;
    }

    /**
     * Set the value of externalInvoiceRefId
     *
     * @return  self
     */
    public function setExternalInvoiceRefId($externalInvoiceRefId)
    {
        $this->externalInvoiceRefId = $externalInvoiceRefId;
        return $this;
    }

    /**
     * Get the value of ccEmails
     */
    public function getCcEmails()
    {
        return $this->ccEmails;
    }

    /**
     * Set the value of ccEmails
     *
     * @return  self
     */
    public function setCcEmails($ccEmails)
    {
        $this->ccEmails = $ccEmails;
        return $this;
    }

    /**
     * Get the value of purposeOfPayment
     */
    public function getPurposeOfPayment()
    {
        return $this->purposeOfPayment;
    }

    /**
     * Set the value of purposeOfPayment
     *
     * @return  self
     */
    public function setPurposeOfPayment($purposeOfPayment)
    {
        $this->purposeOfPayment = $purposeOfPayment;
        return $this;
    }

    /**
     * Get the value of attachments
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Set the value of attachments
     *
     * @return  self
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * Get the value of exchangeRateQuoteId
     */
    public function getExchangeRateQuoteId()
    {
        return $this->exchangeRateQuoteId;
    }

    /**
     * Set the value of exchangeRateQuoteId
     *
     * @return  self
     */
    public function setExchangeRateQuoteId($exchangeRateQuoteId)
    {
        $this->exchangeRateQuoteId = $exchangeRateQuoteId;
        return $this;
    }

    /**
     * Get the value of approveAutomatically
     */
    public function getApproveAutomatically()
    {
        return $this->approveAutomatically;
    }

    /**
     * Set the value of approveAutomatically
     *
     * @return  self
     */
    public function setApproveAutomatically($approveAutomatically)
    {
        $this->approveAutomatically = $approveAutomatically;

        return $this;
    }
}
