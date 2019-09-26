<?php


namespace Veem\model;


class Address
{
    private $line1;
    private $line2;
    private $city;
    private $stateProvince;
    private $postalCode;

    /**
     * Get the value of line1
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Set the value of line1
     *
     * @return  self
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * Get the value of line2
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Set the value of line2
     *
     * @return  self
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get the value of stateProvince
     */
    public function getStateProvince()
    {
        return $this->stateProvince;
    }

    /**
     * Set the value of stateProvince
     *
     * @return  self
     */
    public function setStateProvince($stateProvince)
    {
        $this->stateProvince = $stateProvince;
        return $this;
    }

    /**
     * Get the value of postalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }
}
