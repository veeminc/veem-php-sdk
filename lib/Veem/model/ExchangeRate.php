<?php


namespace Veem\model;


class ExchangeRate
{
    private $hashId;
    private $fromCountry;
    private $fromCurrency;
    private $fromAmount;
    private $toCountry;
    private $toCurrency;
    private $toAmount;
    private $rate;
    private $expiry;
    private $timeCreated;

    /**
     * Get the value of hashId
     */
    public function getHashId()
    {
        return $this->hashId;
    }

    /**
     * Set the value of hashId
     *
     * @return  self
     */
    public function setHashId($hashId)
    {
        $this->hashId = $hashId;
        return $this;
    }

    /**
     * Get the value of fromAmount
     */
    public function getFromAmount()
    {
        return $this->fromAmount;
    }

    /**
     * Set the value of fromAmount
     *
     * @return  self
     */
    public function setFromAmount($fromAmount)
    {
        $this->fromAmount = $fromAmount;
        return $this;
    }

    /**
     * Get the value of fromCurrency
     */
    public function getFromCurrency()
    {
        return $this->fromCurrency;
    }

    /**
     * Set the value of fromCurrency
     *
     * @return  self
     */
    public function setFromCurrency($fromCurrency)
    {
        $this->fromCurrency = $fromCurrency;
        return $this;
    }

    /**
     * Get the value of fromCountry
     */
    public function getFromCountry()
    {
        return $this->fromCountry;
    }

    /**
     * Set the value of fromCountry
     *
     * @return  self
     */
    public function setFromCountry($fromCountry)
    {
        $this->fromCountry = $fromCountry;
        return $this;
    }

    /**
     * Get the value of toAmount
     */
    public function getToAmount()
    {
        return $this->toAmount;
    }

    /**
     * Set the value of toAmount
     *
     * @return  self
     */
    public function setToAmount($toAmount)
    {
        $this->toAmount = $toAmount;
        return $this;
    }

    /**
     * Get the value of toCurrency
     */
    public function getToCurrency()
    {
        return $this->toCurrency;
    }

    /**
     * Set the value of toCurrency
     *
     * @return  self
     */
    public function setToCurrency($toCurrency)
    {
        $this->toCurrency = $toCurrency;
        return $this;
    }

    /**
     * Get the value of toCountry
     */
    public function getToCountry()
    {
        return $this->toCountry;
    }

    /**
     * Set the value of toCountry
     *
     * @return  self
     */
    public function setToCountry($toCountry)
    {
        $this->toCountry = $toCountry;
        return $this;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * Get the value of expiry
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * Set the value of expiry
     *
     * @return  self
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
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
}
