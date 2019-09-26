<?php

namespace Veem\clients;

use Veem\clients\VeemClient;
use GuzzleHttp\Client;

use Veem\converters\VeemErrorResponseConverter;

class BaseClient
{
    /*
        The Base class for Endpoint Client, which contains 3 wrapper class for
        handling GET/POST/PATCH requests.
    */

    const PRODUCTION = 'PRODUCTION';
    const SANDBOX_BASE_URL = "https://sandbox-api.veem.com";
    const PRODUCTION_BASE_URL = "https://api.veem.com";

    protected $veemClient;
    protected $baseURL;
    protected $httpClient;

    public function __construct(VeemClient $veemClient)
    {
        $this->veemClient = $veemClient;
        $this->baseURL = (strcmp(
            $veemClient->getEnvironment(),
            self::PRODUCTION
        ) == 0) ? self::PRODUCTION_BASE_URL : self::SANDBOX_BASE_URL;

        $this->httpClient = new Client(array('base_uri' => $this->baseURL));
    }

    public static function uuid_v4()
    {
        // author: Andrew Moore
        // source: https://www.php.net/manual/en/function.uniqid.php#94959
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    protected function getRequestHeaders()
    {
        /* getRequestHeaders function

            Construct requests header for basic or bearer authorization.
        */
        $headers = [];

        if ($this->veemClient != null) {
            if (!empty($this->veemClient->getAccessToken())) {
                $headers['headers'] = [
                    'Authorization' => 'Bearer ' . $this->veemClient->getAccessToken(),
                    'X-REQUEST-ID' => self::uuid_v4()
                ];
            } else {
                $headers['auth'] = array(
                    $this->veemClient->getClientId(),
                    $this->veemClient->getClientSecret()
                );
            }
        }
        return $headers;
    }

    private function constructRequest($query = null, $headers = null, $content = null)
    {
        /* constructRequest function

            Construct requests body for GET request.
        */
        $request_body = array();
        if ($content != null && !empty($content)) {
            $request_body = $content;
        }
        if ($query != null && !empty($query)) {
            $request_body['query'] = $query;
        }
        $request_body += ($headers) ?? $this->getRequestHeaders();
        return $request_body;
    }

    private function constructContentRequest($content, $query = null, $headers = null, $jsonRequest = true)
    {
        /* constructContentRequest function

            Construct requests body for POST/PATCH request.
        */
        $request_body = array();
        if ($content != null && !empty($content)) {
            if ($jsonRequest) $request_body['json'] = $content;
            else  $request_body = $content;
        }
        if ($query != null && !empty($query)) {
            $request_body['query'] = $query;
        }
        $request_body += ($headers) ?? $this->getRequestHeaders();
        return $request_body;
    }

    public function getRequest(
        $endpoint,
        $query = null,
        $headers = null,
        $content = [],
        $jsonResponse = true
    )
    {
        /* getRequest function

            Handler for GET request.
            If response statusCode is other than 200, 201, 204, 302, 304,
                return VeemErrorResponse
            Else return json response body
        */
        $response = $this->httpClient->get(
            $this->baseURL . $endpoint,
            $this->constructRequest($query, $headers, $content)
        );
        if (!$jsonResponse) return $response;
        $responseBody = json_decode($response->getBody(), true);
        if (!in_array($response->getStatusCode(), array(200, 201, 204, 302, 304))) {
            return VeemErrorResponseConverter::convertResponse($responseBody);
        }
        return $responseBody;
    }

    public function postRequest(
        $endpoint,
        $json = null,
        $query = null,
        $headers = null,
        $jsonRequest = true,
        $jsonResponse = true
    )
    {
        /* postRequest function

            Handler for POST request.
            If response statusCode is other than 200, 201, 204, 302, 304,
                return VeemErrorResponse
            Else return json response body
        */
        $response = $this->httpClient->post(
            $this->baseURL . $endpoint,
            $this->constructContentRequest($json, $query, $headers, $jsonRequest)
        );
        if (!$jsonResponse) return $response;
        $responseBody = json_decode($response->getBody(), true);
        if (!in_array($response->getStatusCode(), array(200, 201, 204, 302, 304))) {
            return VeemErrorResponseConverter::convertResponse($responseBody);
        }
        return $responseBody;
    }

    public function patchRequest(
        $endpoint,
        $json,
        $query = null,
        $headers = null,
        $jsonRequest = true,
        $jsonResponse = true
    )
    {
        /* patchRequest function

            Handler for PATCH request.
            If response statusCode is other than 200, 201, 204, 302, 304,
                return VeemErrorResponse
            Else return json response body
        */
        $response = $this->httpClient->patch(
            $this->baseURL . $endpoint,
            $this->constructContentRequest($json, $query, $headers, $jsonRequest)
        );
        if (!$jsonResponse) return $response;
        $responseBody = json_decode($response->getBody(), true);
        if (!in_array($response->getStatusCode(), array(200, 201, 204, 302, 304))) {
            return VeemErrorResponseConverter::convertResponse($responseBody);
        }
        return $responseBody;
    }
}
