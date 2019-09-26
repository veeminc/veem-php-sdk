<?php


namespace Veem\model;


class ContactListParameters
{
    private $email;
    private $firstName;
    private $lastName;
    private $businessName;
    private $batchId;
    private $batchItemIds;
    private $pageNumber;
    private $pageSize;

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
     * Get the value of batchId
     */
    public function getBatchId()
    {
        return $this->batchId;
    }

    /**
     * Set the value of batchId
     *
     * @return  self
     */
    public function setBatchId($batchId)
    {
        $this->batchId = $batchId;
        return $this;
    }

    /**
     * Get the value of batchItemIds
     */
    public function getBatchItemIds()
    {
        return $this->batchItemIds;
    }

    /**
     * Set the value of batchItemIds
     *
     * @return  self
     */
    public function setBatchItemIds($batchItemIds)
    {
        $this->batchItemIds = $batchItemIds;
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
