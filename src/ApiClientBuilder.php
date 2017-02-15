<?php


namespace BraintreeDemo;

use Braintree\Configuration;
use Braintree\ResourceCollection;
use Braintree\Transaction;
use Braintree\TransactionSearch;

class ApiClientBuilder
{
    private $environment;
    private $merchantID;
    private $publicKey;
    private $privateKey;

    public function __construct($environment, $merchantId, $publicKey, $privateKey)
    {
        $this->environment = $environment;
        $this->merchantID = $merchantId;
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    /**
     * @param $amount
     * @return array
     */
    public function sale($amount)
    {
        $this->setConfig();
        $result = Transaction::sale([
            'amount' => $amount,
            'paymentMethodNonce' => 'fake-valid-nonce'
        ]);

        return $result;
    }

    /**
     * @param string $transactionID
     * @return Transaction
     */
    public function find($transactionID)
    {
        $this->setConfig();
        $transaction = Transaction::find($transactionID);

        return $transaction;
    }

    /**
     * @param \DateTime $dateTime
     * @return ResourceCollection
     */
    public function searchTransactionsSettledAfter(\DateTime $dateTime)
    {
        $this->setConfig();
        return Transaction::search([TransactionSearch::settledAt()->greaterThanOrEqualTo($dateTime)]);
    }

    private function setConfig()
    {
        Configuration::environment($this->environment);
        Configuration::merchantId($this->merchantID);
        Configuration::publicKey($this->publicKey);
        Configuration::privateKey($this->privateKey);
    }
}
