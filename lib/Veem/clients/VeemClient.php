<?php


namespace Veem\clients;


class VeemClient
{
    /*
        The Context Manager for Veem SDK Client
    */
    private $paymentClient;
    private $invoiceClient;
    private $contactClient;
    private $metadataClient;
    private $customerClient;
    private $attachmentClient;
    private $exchangeRateClient;
    private $authenticationClient;

    private $clientId;
    private $clientSecret;
    private $environment;
    private $authorizationCode;
    private $redirectUrl;
    private $accessToken;
    private $refreshToken;

    public function __construct($veemContext,
        $loginFromClientCredentials=false,
        $loginFromAuthorizationCode = false)
    {
        $this->clientId = $veemContext->getClientId();
        $this->clientSecret = $veemContext->getClientSecret();
        $this->environment = $veemContext->getEnvironment();
        $this->authorizationCode = $veemContext->getAuthorizationCode();
        $this->redirectUrl = $veemContext->getRedirectUrl();

        $this->authenticationClient = new AuthenticationClient($this);
        $this->paymentClient = new PaymentClient($this);
        $this->invoiceClient = new InvoiceClient($this);
        $this->contactClient = new ContactClient($this);
        $this->metadataClient = new MetadataClient($this);
        $this->customerClient = new CustomerClient($this);
        $this->attachmentClient = new AttachmentClient($this);
        $this->exchangeRateClient = new ExchangeRateClient($this);

        if ($loginFromClientCredentials)
        {
            $this->getTokenFromClientCredentials();
        }
        elseif ($loginFromAuthorizationCode)
        {
            $this->getTokenFromAuthorizationCode();
        }

    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setAccessToken($token)
    {
        $this->accessToken = $token;
    }

    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    public function setRefreshToken($token)
    {
        $this->refreshToken = $token;
    }

    public function getTokenFromClientCredentials()
    {
        if (empty($this->clientId) && empty($this->clientSecret)) {
            throw new Exception('clientId and clientSecret are missing');
        }

        return $this->authenticationClient->getTokenFromClientCredentials();
    }

    public function getTokenFromAuthorizationCode()
    {
        if (empty($this->clientId) && empty($this->clientSecret)) {
            throw new Exception('clientId and clientSecret are missing');
        }

        if (empty($this->authorizationCode)) {
            throw new Exception('authorizationCode is missing');
        }

        return $this->authenticationClient->getTokenFromAuthorizationCode();
    }

    /**
     * Get the value of environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set the value of environment
     *
     * @return  self
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }


    /**
     * Get the value of paymentClient
     */
    public function getPaymentClient()
    {
        return $this->paymentClient;
    }

    /**
     * Get the value of invoiceClient
     */
    public function getInvoiceClient()
    {
        return $this->invoiceClient;
    }

    /**
     * Get the value of contactClient
     */
    public function getContactClient()
    {
        return $this->contactClient;
    }

    /**
     * Get the value of metadataClient
     */
    public function getMetadataClient()
    {
        return $this->metadataClient;
    }

    /**
     * Get the value of customerClient
     */
    public function getCustomerClient()
    {
        return $this->customerClient;
    }

    /**
     * Get the value of attachmentClient
     */
    public function getAttachmentClient()
    {
        return $this->attachmentClient;
    }

    /**
     * Get the value of exchangeRateClient
     */
    public function getExchangeRateClient()
    {
        return $this->exchangeRateClient;
    }

    /**
     * Get the value of authenticationClient
     */
    public function getAuthenticationClient()
    {
        return $this->authenticationClient;
    }
}
