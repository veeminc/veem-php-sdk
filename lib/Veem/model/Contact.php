<?php


namespace Veem\model;


class Contact
{
    private $id;
    private $externalId;
    private $contactAccountId;
    private $email;
    private $firstName;
    private $lastName;
    private $businessName;
    private $countryCode;
    private $dialCode;
    private $phoneNumber;
    private $batchItemId;
    private $type;
    private $bankAccount;
    private $address;

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
     * Get the value of externalId
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Set the value of externalId
     *
     * @return  self
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * Get the value of contactAccountId
     */
    public function getContactAccountId()
    {
        return $this->contactAccountId;
    }

    /**
     * Set the value of contactAccountId
     *
     * @return  self
     */
    public function setContactAccountId($contactAccountId)
    {
        $this->contactAccountId = $contactAccountId;
        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get the value of businessName
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Set the value of businessName
     *
     * @return  self
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;
        return $this;
    }

    /**
     * Get the value of countryCode
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set the value of countryCode
     *
     * @return  self
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * Get the value of dialCode
     */
    public function getDialCode()
    {
        return $this->dialCode;
    }

    /**
     * Set the value of dialCode
     *
     * @return  self
     */
    public function setDialCode($dialCode)
    {
        $this->dialCode = $dialCode;
        return $this;
    }

    /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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

    /**
     * Get the value of bankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Set the value of bankAccount
     *
     * @return  self
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }
}
