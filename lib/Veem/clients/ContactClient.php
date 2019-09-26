<?php

namespace Veem\clients;

use Veem\converters\BatchConverter;
use Veem\converters\ContactConverter;
use Veem\converters\ContactListParametersConverter;
use Veem\model\Batch;
use Veem\model\Contact;
use Veem\model\ContactListParameters;

class ContactClient extends BaseClient
{
    const API_URL = "/veem/v1.1/contacts";

    public function get($contactId)
    {
        /*
            Get a specific contact by id

            @param request: contact id
            @return Contact that you just requested
            or ErrorResponse If the provided contactId is invalid, or
                                  if retriving fails.
        */
        $response = $this->getRequest(self::API_URL . "/${contactId}");
        return ContactConverter::convertResponse($response);
    }

    public function create(Contact $contact)
    {
        /*
            Create a contact

            @param request: a ContactRequest
            @return Contact that you just requested
            or ErrorResponse If the provided ContactRequest is invalid, or
                                  if creation fails.
        */
        $response = $this->postRequest(
            self::API_URL,
            ContactConverter::convertRequest($contact)
        );
        return ContactConverter::convertResponse($response);
    }

    public function list(ContactListParameters $parameters = null)
    {
        /*
            Get all contacts in pagination format

            @param request: a ContactListParameters
            @return paginated Contacts for your account
        */
        $response = $this->getRequest(
            self::API_URL,
            ContactListParametersConverter::convertRequest($parameters)
        );
        $content = array();
        foreach ($response["content"] ?? [] as $value) {
            array_push($content, ContactConverter::convertResponse($value));
        }
        return ContactConverter::convertPageResponse($response, $content);
    }

    public function createBatch(Batch $batch)
    {
        /*
            Create a batch of contacts

            @param request: a list of ContactRequest
            @return contact batch
            or ErrorResponse If the provided request is invalid, or
                                  if creating fails.
        */
        $response = $this->postRequest(
            self::API_URL . "/batch",
            BatchConverter::convertRequest($batch)
        );
        return BatchConverter::convertResponse($response);
    }
    public function getBatch($batchId)
    {
        /*
            Get a specific contacts batch

            @param request: Batch id
            @return contact batch
            or ErrorResponse If the provided batchId is invalid, or
                                  if retriving fails.
        */
        $response = $this->getRequest(self::API_URL . "/batch/${batchId}");
        return BatchConverter::convertResponse($response);
    }
}
