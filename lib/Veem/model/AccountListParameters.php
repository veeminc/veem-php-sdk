<?php


namespace Veem\model;


class AccountListParameters
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
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
}
