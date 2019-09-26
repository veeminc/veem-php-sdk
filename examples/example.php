<?php

require(dirname(__FILE__) . '/../vendor/autoload.php');

use Veem\VeemContext;

use Veem\clients\BaseClient;
use Veem\clients\VeemClient;

use Veem\model\Batch;
use Veem\model\Amount;
use Veem\model\Account;
use Veem\model\Contact;
use Veem\model\Invoice;
use Veem\model\Payment;
use Veem\model\Attachment;
use Veem\model\ExchangeRate;
use Veem\model\AccountListParameters;
use Veem\model\ContactListParameters;

$context = new VeemContext("Test-46ecbf0b", "34b20dcf-6e6c-4bd4-83c3-159d5b7c3c27");
$veem = new VeemClient($context, $loginFromClientCredentials=true);

print('====================================' . PHP_EOL);
print('Checking FX Rate Generation Endpoint' . PHP_EOL);
print('====================================' . PHP_EOL);
$request = new ExchangeRate();
$request->setFromCountry('CA')
        ->setFromCurrency('CAD')
        ->setFromAmount(500.0)
        ->setToCountry('US')
        ->setToCurrency('USD');
$response = $veem->getExchangeRateClient()->generate($request);
print('Generate Exchange Rate for 500 CAD to USD from CA to US: ' . $response->getToAmount() . ' USD' . PHP_EOL);

print('====================================' . PHP_EOL);
print('Checking Metadata Endpoint' . PHP_EOL);
print('====================================' . PHP_EOL);
$response = $veem->getMetadataClient()->getCountryCurrencyMap();
print('Supporting ' . count($response) . ' Countries' . PHP_EOL);

print('====================================' . PHP_EOL);
print('Checking Customers Endpoint' . PHP_EOL);
print('====================================' . PHP_EOL);
$parameters = new AccountListParameters('testadmin@ac.com');
$response = $veem->getCustomerClient()->list($parameters);
$account = !empty($response->getContent()) ? $response->getContent()[0] : new Account();
print('Found Account in the Network: ' . $account->getEmail() . PHP_EOL);

print('====================================' . PHP_EOL);
print('Checking Contacts Endpoint' . PHP_EOL);
print('====================================' . PHP_EOL);
$email_uuid = BaseClient::uuid_v4();
$email1 = sprintf('devsupport+%s1@veem.com', $email_uuid);
$email2 = sprintf('devsupport+%s2@veem.com', $email_uuid);

$contactRequest = new Contact();
$contactRequest->setEmail($email1)
               ->setFirstName('Wei')
               ->setLastName('Chen')
               ->setCountryCode('GB')
               ->setPhoneNumber("370-010-0222");
$contact = $veem->getContactClient()->create($contactRequest);
print('Account ' . $email1 . ' created: ID' . $contact->getId() . PHP_EOL);

$response = $veem->getContactClient()->list();
print('Found ' . $response->getTotalElements() . ' Contacts' . PHP_EOL);

$parameters = new ContactListParameters();
$parameters->setEmail($email1);
$response = $veem->getContactClient()->list($parameters);
print('Found Newly Created Contract ' . $response->getContent()[0]->getEmail() . PHP_EOL);

$response = $veem->getContactClient()->get($contact->getId());
print('Retrieve ' . $response->getCountryCode() . ' Contact ' . $response->getEmail() . PHP_EOL);

$contactRequest->setEmail($email2)->setBatchItemId(1);
$batch = new Batch();
$batch->setBatchItems([$contactRequest]);
$batch = $veem->getContactClient()->createBatch($batch);
print('Batch ' . $batch->getBatchId() . ' Status: ' . $batch->getStatus() . PHP_EOL);

print('Sleeping or 5 seconds for Batch to be processed' . PHP_EOL);
sleep ( 5 );

$batch = $veem->getContactClient()->getBatch($batch->getBatchId());
print('Checking Batch ' . $batch->getBatchId() . ' Status: ' . $batch->getStatus() . PHP_EOL);

print('====================================' . PHP_EOL);
print('Checking Payment Endpoint' . PHP_EOL);
print('====================================' . PHP_EOL);
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
$paymentRequest = new Payment();
$paymentRequest->setAmount($amount)
               ->setPayee($account)
               ->setApproveAutomatically(false);
$payment = $veem->getPaymentClient()->create($paymentRequest);
print('Payment ' . $payment->getId() . ' created, Status ' . $payment->getStatus() . PHP_EOL);
$payment = $veem->getPaymentClient()->get($payment->getId());
print('Retrieve Payment ' . $payment->getId() . PHP_EOL);
$payment = $veem->getPaymentClient()->send($payment->getId());
print('Sending Payment ' . $payment->getId() . PHP_EOL);
$payment = $veem->getPaymentClient()->cancel($payment->getId());
print('Cancelling Payment ' . $payment->getId() . PHP_EOL);
$payments = $veem->getPaymentClient()->list();
$payment = $payments->getContent()[0];
print('First Payment ID is ' . $payment->getId() .' Status ' . $payment->getStatus() . PHP_EOL);

print('====================================' . PHP_EOL);
print('Checking Invoice Endpoint' . PHP_EOL);
print('====================================' . PHP_EOL);
$invoiceRequest = new Invoice();
$invoiceRequest->setAmount($amount)->setPayer($account);
$invoice = $veem->getInvoiceClient()->create($invoiceRequest);
print('Invoice ' . $invoice->getId() . ' created, Status ' . $invoice->getStatus() . PHP_EOL);
$invoice = $veem->getInvoiceClient()->get($invoice->getId());
print('Retrieve Invoice ' . $invoice->getId() . ' Status ' . $invoice->getStatus() . PHP_EOL);
$invoice = $veem->getInvoiceClient()->cancel($invoice->getId());
print('Cancelling Invoice ' . $invoice->getId() . ' Status ' . $invoice->getStatus() . PHP_EOL);

print('====================================' . PHP_EOL);
print('Checking Attachment Endpoint' . PHP_EOL);
print('====================================' . PHP_EOL);
$attachment = new Attachment();
$attachment->setName('forUpload.png')->setPath(join(DIRECTORY_SEPARATOR, array(dirname(__FILE__), 'forUpload.png')));
$attachment = $veem->getAttachmentClient()->upload($attachment, 'invoice for shipping');
print('Attachment ' . $attachment->getName() . ' created, Reference Id ' . $attachment->getReferenceId() . PHP_EOL);
$response = $veem->getAttachmentClient()->download($attachment);
print('Attachment downloaded at ' . $response . PHP_EOL);
print('Sleeping or 2 seconds for attachment downloading ... ' . PHP_EOL);
sleep(2);
$response = $veem->getAttachmentClient()->download($attachment, '/tmp');
print('Attachment downloaded at ' . $response . PHP_EOL);
print('Sleeping or 2 seconds for attachment downloading ... ' . PHP_EOL);
sleep(2);
$attachment->setPath(null);
$response = $veem->getAttachmentClient()->download($attachment);
print('Attachment downloaded at ' . $response . PHP_EOL);
