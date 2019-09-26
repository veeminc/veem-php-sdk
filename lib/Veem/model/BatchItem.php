<?php


namespace Veem\model;


class BatchItem
{
    private $id;
    private $batchItemId;
    private $status;
    private $errorInfo;
    private $paymentId;
    private $contactId;
    private $type;

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
     * Get the value of errorInfo
     */
    public function getErrorInfo()
    {
        return $this->errorInfo;
    }

    /**
     * Set the value of errorInfo
     *
     * @return  self
     */
    public function setErrorInfo($errorInfo)
    {
        $this->errorInfo = $errorInfo;
        return $this;
    }

    /**
     * Get the value of paymentId
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set the value of paymentId
     *
     * @return  self
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    /**
     * Get the value of contactId
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * Set the value of contactId
     *
     * @return  self
     */
    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
