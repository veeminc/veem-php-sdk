<?php


namespace Veem\model;


class VeemErrorResponse
{
    private $message;
    private $code;
    private $logTag;
    private $timestamp;
    private $fileName;
    private $lineNumber;

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get the value of logTag
     */
    public function getLogTag()
    {
        return $this->logTag;
    }

    /**
     * Set the value of logTag
     *
     * @return  self
     */
    public function setLogTag($logTag)
    {
        $this->logTag = $logTag;
        return $this;
    }

    /**
     * Get the value of timestamp
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set the value of timestamp
     *
     * @return  self
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Get the value of fileName
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set the value of fileName
     *
     * @return  self
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * Get the value of lineNumber
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Set the value of lineNumber
     *
     * @return  self
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }
}
