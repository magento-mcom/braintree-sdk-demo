<?php
require __DIR__ . '/../vendor/autoload.php';

use BraintreeDemo\ApiClientBuilder;
use BraintreeDemo\ApiClientConfig;

const DEFAULT_TRANSACTION_ID = '7t2tergv';

$config = new ApiClientConfig();

$client = (new ApiClientBuilder($config->getApiEnvironment(),$config->getMerchantId(),$config->getApiKey(),$config->getApiSecret()));

$transactionID = DEFAULT_TRANSACTION_ID;

$transaction = $client->find($transactionID);

print_r("Transaction " . $transactionID . " is " . $transaction->status . "\n");

$transaction = Braintree\Test\Transaction::settle($transactionID);
get_class($transaction);

$transaction->status;

print_r("Transaction " . $transactionID . " is " . $transaction->status . "\n");