<?php

require __DIR__ . '/../vendor/autoload.php';

use BraintreeDemo\ApiClientBuilder;
use BraintreeDemo\ApiClientConfig;

const DEFAULT_TRANSACTION_ID = '7t2tergv';

$config = new ApiClientConfig();

$client = (new ApiClientBuilder($config->getApiEnvironment(),$config->getMerchantId(),$config->getApiKey(),$config->getApiSecret()));

$transactionID = DEFAULT_TRANSACTION_ID;

$transaction = $client->find($transactionID);

print_r("Transaction " . $transactionID . " is " . $transaction->status . " for " . $transaction->amount . "\n");

try {
    $result = Braintree\Transaction::refund($transactionID);
    if ($result->success) {
        print_r("Transaction " . $transactionID . " successfully refunded by " . $result->transaction->id . "\n");
        $transaction = $client->find($result->transaction->id);
        print_r("Transaction " . $transaction->id . " is " . $transaction->status . " for " . $transaction->amount . "\n");
    } else{
        print_r($result->errors);
    }
} catch (Braintree\Exception\NotFound $e) {
    echo $e->getMessage();
}