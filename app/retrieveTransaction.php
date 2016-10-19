<?php

require __DIR__ . '/../vendor/autoload.php';

use BraintreeDemo\ApiClientBuilder;
use BraintreeDemo\ApiClientConfig;

$config = new ApiClientConfig();

$client = (new ApiClientBuilder($config->getApiEnvironment(),$config->getMerchantId(),$config->getApiKey(),$config->getApiSecret()));

$transactionID = $argv[1];

$transaction = $client->find($transactionID);

print_r("Transaction " . $transactionID . " is " . $transaction->status . "\n");