<?php


namespace Veem\model;


class PaymentApproval
{
    private $approversCompleted;
    private $status;
    private $approversRequired;
    private $approvers;

    /**
     * Get the value of approversCompleted
     */
    public function getApproversCompleted()
    {
        return $this->approversCompleted;
    }

    /**
     * Set the value of approversCompleted
     *
     * @return  self
     */
    public function setApproversCompleted($approversCompleted)
    {
        $this->approversCompleted = $approversCompleted;
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
     * Get the value of approversRequired
     */
    public function getApproversRequired()
    {
        return $this->approversRequired;
    }

    /**
     * Set the value of approversRequired
     *
     * @return  self
     */
    public function setApproversRequired($approversRequired)
    {
        $this->approversRequired = $approversRequired;
        return $this;
    }

    /**
     * Get the value of approvers
     */
    public function getApprovers()
    {
        return $this->approvers;
    }

    /**
     * Set the value of approvers
     *
     * @return  self
     */
    public function setApprovers($approvers)
    {
        $this->approvers = $approvers;
        return $this;
    }
}
