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

use PHPUnit\Framework\TestCase;

class VeemSandboxTest extends TestCase
{
    public function testLoadingContext()
    {
        // testing context manager of the sdk client
        $context = new VeemContext("Test-46ecbf0b", "34b20dcf-6e6c-4bd4-83c3-159d5b7c3c27");
        $veem = new VeemClient($context);
        $this->assertTrue(empty($veem->getAccessToken()));
        $this->assertEquals($veem->getClientId(), "Test-46ecbf0b");
    }

    public function testLogin()
    {
        // testing actual login to sandbox
        $context = new VeemContext("Test-46ecbf0b", "34b20dcf-6e6c-4bd4-83c3-159d5b7c3c27");
        $veem = new VeemClient($context, $loginFromClientCredentials = true);
        $this->assertTrue(!empty($veem->getAccessToken()));
        $this->assertEquals($veem->getClientId(), "Test-46ecbf0b");
        return $veem;
    }

    /**
     * @depends testLogin
     */
    public function testGenerateRate($veem)
    {
        // testing generating an exchange rate request
        $request = new ExchangeRate();
        $request->setFromCountry('CA')
                ->setFromCurrency('CAD')
                ->setFromAmount(500.0)
                ->setToCountry('US')
                ->setToCurrency('USD');
        $response = $veem->getExchangeRateClient()->generate($request);
        $this->assertTrue(!empty($response->getHashId()));
    }
    /**
     * @depends testLogin
     */
    public function testCountryCurrencyMap($veem)
    {
        // testing getting all supported countries and currencies
        $response = $veem->getMetadataClient()->getCountryCurrencyMap();
        $this->assertTrue(!empty($response));
    }
    /**
     * @depends testLogin
     */
    public function testCustomers($veem)
    {
        // testing searching a particular user with specific email address
        $parameters = new AccountListParameters('testadmin@ac.com');
        $response = $veem->getCustomerClient()->list($parameters);
        $account = !empty($response->getContent()) ? $response->getContent()[0] : new Account();
        $this->assertEquals($account->getEmail(), 'testadmin@ac.com');
    }
    /**
     * @depends testLogin
     */
    public function testContacts($veem)
    {
        $email_uuid = BaseClient::uuid_v4();
        $email1 = sprintf('devsupport+%s1@veem.com', $email_uuid);
        $email2 = sprintf('devsupport+%s2@veem.com', $email_uuid);

        $contactRequest = new Contact();
        $contactRequest->setEmail($email1)
                    ->setFirstName('Wei')
                    ->setLastName('Chen')
                    ->setCountryCode('GB')
                    ->setPhoneNumber("370-010-0222");
        // testing creating a contact
        $contact = $veem->getContactClient()->create($contactRequest);
        $this->assertTrue(!empty($contact->getId()));
        // testing contact listing
        $response = $veem->getContactClient()->list();
        $this->assertTrue(!empty($response->getContent()));
        $this->assertTrue($response->getTotalElements() > 0);
        // testing contact listing with filter
        $parameters = new ContactListParameters();
        $parameters->setEmail($email1);
        $response = $veem->getContactClient()->list($parameters);
        $this->assertEquals($response->getContent()[0]->getEmail(), $email1);
        // testing specific contact retriving
        $response = $veem->getContactClient()->get($contact->getId());
        $this->assertEquals($response->getCountryCode(), 'GB');
        $this->assertEquals($response->getEmail(), $email1);
        // testing contact batch creation
        $contactRequest->setEmail($email2)->setBatchItemId(1);
        $batch = new Batch();
        $batch->setBatchItems([$contactRequest]);
        $batch = $veem->getContactClient()->createBatch($batch);
        $this->assertTrue(!empty($batch->getBatchId()));
        $this->assertEquals($batch->getStatus(), 'InProgress');

        sleep ( 5 );
        // testing contact batch retrival
        $response = $veem->getContactClient()->getBatch($batch->getBatchId());
        $this->assertEquals($response->getStatus(), 'Completed');

    }
    /**
     * @depends testLogin
     */
    public function testPayments($veem)
    {
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
        // testing payment creation with disabled auto approval
        $payment = $veem->getPaymentClient()->create($paymentRequest);
        $this->assertTrue(!empty($payment->getId()));
        // testing payment retrival
        $payment = $veem->getPaymentClient()->get($payment->getId());
        $this->assertTrue(!empty($payment->getId()));
        $this->assertEquals($payment->getStatus(), 'Drafted');
        // testing send drafted payment
        $payment = $veem->getPaymentClient()->send($payment->getId());
        $this->assertTrue(!empty($payment->getId()));
        $this->assertEquals($payment->getStatus(), 'Sent');
        // testing cancel a payment
        $payment = $veem->getPaymentClient()->cancel($payment->getId());
        $this->assertTrue(!empty($payment->getId()));
        $this->assertEquals($payment->getStatus(), 'Cancelled');
        // testing payment listing
        $payments = $veem->getPaymentClient()->list();
        $payment = $payments->getContent()[0];
        $this->assertTrue(!empty($payment->getId()));
        $this->assertEquals($payment->getStatus(), 'Cancelled');

    }
    /**
     * @depends testLogin
     */
    public function testInvoices($veem)
    {
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
        // testing invoice creation
        $invoice = $veem->getInvoiceClient()->create($invoiceRequest);
        $this->assertTrue(!empty($invoice->getId()));
        // testing invoice retrival
        $invoice = $veem->getInvoiceClient()->get($invoice->getId());
        $this->assertTrue(!empty($invoice->getId()));
        $this->assertEquals($invoice->getStatus(), 'Sent');
        // testing cancel invoice
        $invoice = $veem->getInvoiceClient()->cancel($invoice->getId());
        $this->assertTrue(!empty($invoice->getId()));
        $this->assertEquals($invoice->getStatus(), 'Cancelled');
    }
    /**
     * @depends testLogin
     */
    public function testAttachments($veem)
    {
        $attachment = new Attachment();
        $attachment->setName('forUpload.png')
                   ->setPath(join(DIRECTORY_SEPARATOR, array(dirname(__FILE__),
                                                             '../examples/forUpload.png')));
        // testing upload attachment
        $attachment = $veem->getAttachmentClient()->upload($attachment, 'invoice for shipping');
        $this->assertTrue(!empty($attachment->getReferenceId()));
        $attachment->setPath(null);
        // testing download attachment
        $response = $veem->getAttachmentClient()->download($attachment);
        $this->assertTrue(!empty($response));
        clearstatcache();
        $this->assertEquals(
            filesize($response),
            filesize(join(DIRECTORY_SEPARATOR, array(dirname(__FILE__), '../examples/forUpload.png'))));
    }
}
