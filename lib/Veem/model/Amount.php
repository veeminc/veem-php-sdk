<?php


namespace Veem\model;


class Amount
{
    private $number;
    private $currency;

    public function __construct($number = null, $currency = null)
    {
        $this->number = $number;
        $this->currency = $currency;
    }

    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get the value of currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
