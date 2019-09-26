<?php


namespace Veem\model;


class Batch
{
    private $id;
    private $batchId;
    private $status;
    private $hasErrors;
    private $processedItems;
    private $totalItems;
    private $batchItems;

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
     * Get the value of hasErrors
     */
    public function getHasErrors()
    {
        return $this->hasErrors;
    }

    /**
     * Set the value of hasErrors
     *
     * @return  self
     */
    public function setHasErrors($hasErrors)
    {
        $this->hasErrors = $hasErrors;
        return $this;
    }

    /**
     * Get the value of processedItems
     */
    public function getProcessedItems()
    {
        return $this->processedItems;
    }

    /**
     * Set the value of processedItems
     *
     * @return  self
     */
    public function setProcessedItems($processedItems)
    {
        $this->processedItems = $processedItems;
        return $this;
    }

    /**
     * Get the value of totalItems
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    /**
     * Set the value of totalItems
     *
     * @return  self
     */
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
        return $this;
    }

    /**
     * Get the value of batchItems
     */
    public function getBatchItems()
    {
        return $this->batchItems;
    }

    /**
     * Set the value of batchItems
     *
     * @return  self
     */
    public function setBatchItems($batchItems)
    {
        $this->batchItems = $batchItems;
        return $this;
    }
}
