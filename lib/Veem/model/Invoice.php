<?php


namespace Veem\model;


class Invoice
{
    private $id;
    private $status;
    private $exchangeRate;
    private $timeCreated;
    private $claimLink;
    private $payer;
    private $clientId;
    private $amount;
    private $notes;
    private $externalInvoiceRefId;
    private $ccEmails;
    private $purposeOfPayment;
    private $attachments;
    private $exchangeRateQuoteId;
    private $dueDate;

    public function __toString()
    {
        return
            "Invoice(id: " . $this->getId() . ", status: " . $this->getStatus() . ")";
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
     * Get the value of dueDate
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set the value of dueDate
     *
     * @return  self
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }
}
