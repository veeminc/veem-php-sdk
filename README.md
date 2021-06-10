Veem-PHP-Sdk
============

The Veem PHP SDK provides an interface to make it easier to call [Veem Global Payments APIs](https://developer.veem.com/reference).

## Version information
- Latest SDK Version: ```1.0.1```
- Latest supported API Endpoint Version: ```v1.1```


## Documentation

- [Veem Global Payments APIs](https://developer.veem.com/reference)
- [Developer Dashboard](https://developer.veem.com/page/dev-dashboard-sandbox)


## System Requirements
1. The SDK works on **PHP 7 and beyond**.
2. A [developer](https://developer.veem.com/page/dev-dashboard-sandbox) account
3. An [application with a customer account](https://developer.veem.com/page/dev-dashboard-sandbox)
   and the associated client id and secret (Authorization flow / Client
   Credentials flow)


## First Use Instructions
1. composer install with command: ```composer require veem/sdk```
2. Start to Use Veem SDK classes in your PHP project


## Testing the Code

To test the code locally, follow the steps below:

1. cd to the project directory
2. Client can either integrate with Authorization flow or Client Credential Flow;
3. For Authorization flow, create a VeemContext object, fill in the `clientId`,
   `clientSecret`, `authorizationCode`, and `redirectUrl`(optional).
4. For Client Credentials flow, create a VeemContext object, fill in the
   `clientId`, and `clientSecret`.
5. To exercise all Veem Global Payment APIs, pass the VeemContext object as
   constructor argument to VeemClient and calling access token methods for
   scenario of step 3 or step 4.


## Getting the OAuth Tokens

In order to get the access tokens from the Developer Portal;

**Sign In with Veem** - Sign into [developer Portal ](https://developer.veem.com/page/dev-dashboard-sandbox).

**Create an Application**- Create a new application by providing the `Name`, `OAuth2 Redirection URLs` and `Payment Status Webhooks`.  If using [2-legged OAuth](https://developer.veem.com/docs/oauth#section-steps-for-two-legged), like in the example below, then ensure `Support 2-legged OAuth` is also enabled.

**Create a Customer**- Create a new customer by providing `Business Name`, `Country` and `Primary Email`

**Get Credentials**- Go the Application and select the `Customer` and copy the `Access Token`.

In order to get the `access token` programmatically, get the client id, client secrets (Optional redirect url for Authorization flow).

```
use Veem\VeemContext;
use Veem\clients\VeemClient;

$context = new VeemContext("Test-46ecbf0b", "34b20dcf-6e6c-4bd4-83c3-159d5b7c3c27");
$veem = new VeemClient($context, $loginFromClientCredentials = true);

// or

$veem = new VeemClient($context);
$veem->getTokenFromClientCredentials();
```

## Invoice Client Example

The following example is to send invoice using `Invoice Client`

```

use Veem\VeemContext;
use Veem\clients\VeemClient;

// define a VeemClient Context Manager and auto login.
$context = new VeemContext("Test-46ecbf0b", "34b20dcf-6e6c-4bd4-83c3-159d5b7c3c27");
$veem = new VeemClient($context, $loginFromClientCredentials = true);

// define an InvoiceRequest

$account = new Account();
$account->setType('Business')
        ->setEmail('devsupport+gbp@veem.com')
        ->setFirstName('Wei')
        ->setLastName('Chen')
        ->setBusinessName('GBP Veem Wei')
        ->setCountryCode('GB')
        ->setPhoneCountryCode('44')
        ->setPhone('03700100222');
$amount = new Amount($number = 50, $currency = 'GBP');
$invoiceRequest = new Invoice();
$invoiceRequest->setAmount($amount)->setPayer($account);

// create an invoice
$invoice = $veem->getInvoiceClient()->create($invoiceRequest);

```

**More Examples can be found under examples folder**
