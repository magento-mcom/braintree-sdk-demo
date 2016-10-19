<?php

require __DIR__ . '/../vendor/autoload.php';

use BraintreeDemo\ApiClientBuilder;
use BraintreeDemo\ApiClientConfig;

const DEFAULT_TRANSACTION_ID = '4xj5e9q9';

$config = new ApiClientConfig();

$client = (new ApiClientBuilder($config->getApiEnvironment(),$config->getMerchantId(),$config->getApiKey(),$config->getApiSecret()));

$transactionID = DEFAULT_TRANSACTION_ID;

$transaction = $client->find($transactionID);

print_r("Transaction " . $transactionID . " is " . $transaction->status . "\n");

$result = Braintree\Transaction::void($transactionID);

if ($result->success) {
    print_r("Transaction " . $transactionID . " successfully voided\n");
} else {
    print_r($result->errors);
}

$transaction = $client->find($transactionID);

print_r("Transaction " . $transactionID . " is " . $transaction->status . "\n");