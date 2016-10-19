<?php
require __DIR__ . '/../vendor/autoload.php';

use BraintreeDemo\ApiClientBuilder;
use BraintreeDemo\ApiClientConfig;

$config = new ApiClientConfig();

$client = (new ApiClientBuilder($config->getApiEnvironment(),$config->getMerchantId(),$config->getApiKey(),$config->getApiSecret()));

$transactionID = $argv[1];

$transaction = $client->find($transactionID);

print_r("Inicial status transaction " . $transactionID . " is " . $transaction->status . "\n");

$transaction = Braintree\Test\Transaction::settle($transactionID);
get_class($transaction);

$transaction->status;

print_r("Final status transaction " . $transactionID . " is " . $transaction->status . "\n");