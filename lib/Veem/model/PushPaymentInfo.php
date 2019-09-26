<?php


namespace Veem\model;


class PushPaymentInfo
{
    private $amount;
    private $reference;
    private $pushPaymentInfo;

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
     * Get the value of reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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
}
