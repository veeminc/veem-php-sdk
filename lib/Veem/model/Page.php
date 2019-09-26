<?php


namespace Veem\model;


class Page
{
    private $number;
    private $size;
    private $totalPages;
    private $numberOfElements;
    private $totalElements;
    private $previousPage;
    private $nextPage;
    private $first;
    private $last;
    private $content;

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
     * Get the value of size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * Get the value of totalPages
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * Set the value of totalPages
     *
     * @return  self
     */
    public function setTotalPages($totalPages)
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    /**
     * Get the value of numberOfElements
     */
    public function getNumberOfElements()
    {
        return $this->numberOfElements;
    }

    /**
     * Set the value of numberOfElements
     *
     * @return  self
     */
    public function setNumberOfElements($numberOfElements)
    {
        $this->numberOfElements = $numberOfElements;
        return $this;
    }

    /**
     * Get the value of totalElements
     */
    public function getTotalElements()
    {
        return $this->totalElements;
    }

    /**
     * Set the value of totalElements
     *
     * @return  self
     */
    public function setTotalElements($totalElements)
    {
        $this->totalElements = $totalElements;
        return $this;
    }

    /**
     * Get the value of previousPage
     */
    public function getPreviousPage()
    {
        return $this->previousPage;
    }

    /**
     * Set the value of previousPage
     *
     * @return  self
     */
    public function setPreviousPage($previousPage)
    {
        $this->previousPage = $previousPage;
        return $this;
    }

    /**
     * Get the value of nextPage
     */
    public function getNextPage()
    {
        return $this->nextPage;
    }

    /**
     * Set the value of nextPage
     *
     * @return  self
     */
    public function setNextPage($nextPage)
    {
        $this->nextPage = $nextPage;
        return $this;
    }

    /**
     * Get the value of first
     */
    public function getFirst()
    {
        return $this->first;
    }

    /**
     * Set the value of first
     *
     * @return  self
     */
    public function setFirst($first)
    {
        $this->first = $first;
        return $this;
    }

    /**
     * Get the value of last
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * Set the value of last
     *
     * @return  self
     */
    public function setLast($last)
    {
        $this->last = $last;
        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
