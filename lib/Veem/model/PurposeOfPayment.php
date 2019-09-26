<?php


namespace Veem\model;


class PurposeOfPayment
{
    private $purposeCode;
    private $description;

    /**
     * Get the value of purposeCode
     */
    public function getPurposeCode()
    {
        return $this->purposeCode;
    }

    /**
     * Set the value of purposeCode
     *
     * @return  self
     */
    public function setPurposeCode($purposeCode)
    {
        $this->purposeCode = $purposeCode;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
