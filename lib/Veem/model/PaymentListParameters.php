<?php


namespace Veem\model;


class PaymentListParameters
{
    private $direction;
    private $paymentIds;
    private $status;
    private $sortParameters;
    private $pageNumber;
    private $pageSize;

    /**
     * Get the value of direction
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Set the value of direction
     *
     * @return  self
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * Get the value of paymentIds
     */
    public function getPaymentIds()
    {
        return $this->paymentIds;
    }

    /**
     * Set the value of paymentIds
     *
     * @return  self
     */
    public function setPaymentIds($paymentIds)
    {
        $this->paymentIds = $paymentIds;
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
     * Get the value of sortParameters
     */
    public function getSortParameters()
    {
        return $this->sortParameters;
    }

    /**
     * Set the value of sortParameters
     *
     * @return  self
     */
    public function setSortParameters($sortParameters)
    {
        $this->sortParameters = $sortParameters;
        return $this;
    }

    /**
     * Get the value of pageNumber
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * Set the value of pageNumber
     *
     * @return  self
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    /**
     * Get the value of pageSize
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * Set the value of pageSize
     *
     * @return  self
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        return $this;
    }
}
