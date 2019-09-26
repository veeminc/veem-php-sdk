<?php

namespace Veem\clients;

use Veem\converters\TokenResponseConverter;

class AuthenticationClient extends BaseClient
{

    const API_URL = "/oauth/token";

    public function getTokenFromClientCredentials()
    {
        /*
            Get Access token using API Client Credential
        */
        $response = $this->postRequest(
            self::API_URL,
            null,
            array("grant_type" => "client_credentials", "scope" => "all")
        );
        $tokenPayload = TokenResponseConverter::convertResponse($response);
        $this->veemClient->setAccessToken($tokenPayload->getAccessToken());
        $this->veemClient->setRefreshToken($tokenPayload->getRefreshToken());
    }

    public function refreshToken($refreshToken = null)
    {
        /*
            Refresh Access token
        */
        $response = $this->postRequest(
            self::API_URL,
            null,
            array("grant_type" => "refresh_token",
                  "refresh_token" => $refreshToken ?? $this->veemClient->getRefreshToken())
        );
        $tokenPayload = TokenResponseConverter::convertResponse($response);
        $this->veemClient->setAccessToken($tokenPayload->getAccessToken());
        $this->veemClient->setRefreshToken($tokenPayload->getRefreshToken());
    }

    public function getTokenFromAuthorizationCode($authorizationCode = null, $redirect_uri = null)
    {
        /*
            Get Access token using authorization code
        */
        $response = $this->postRequest(
            self::API_URL,
            null,
            array("grant_type" => "authorization_code", "scope" => "all",
                  "code" => $authorizationCode ?? $this->veemClient->getAuthorizationCode(),
                  "redirect_uri" => $redirect_uri ?? $this->veemClient->getRedirectUrl())
        );
        $tokenPayload = TokenResponseConverter::convertResponse($response);
        $this->veemClient->setAccessToken($tokenPayload->getAccessToken());
        $this->veemClient->setRefreshToken($tokenPayload->getRefreshToken());
    }
}
