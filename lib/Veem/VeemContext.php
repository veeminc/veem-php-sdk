<?php

namespace Veem;


class VeemContext
{
    private $clientId;
    private $clientSecret;
    private $environment;
    private $authorizationCode;
    private $redirectUrl;

    public function __construct($clientId, $clientSecret,
                                $authorizationCode = null, $redirectUrl = null,
                                $environment = 'SANDBOX')
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->authorizationCode = $authorizationCode;
        $this->redirectUrl = $redirectUrl;
        $this->environment = $environment ?? 'SANDBOX';
    }

    /**
     * Get the value of clientId
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Get the value of clientSecret
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Get the value of environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Get the value of authorizationCode
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * Get the value of redirectUrl
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }
}
