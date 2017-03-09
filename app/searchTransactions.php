<?php

require __DIR__ . '/../vendor/autoload.php';

use BraintreeDemo\ApiClientBuilder;
use BraintreeDemo\ApiClientConfig;

$config = new ApiClientConfig();

$client = (new ApiClientBuilder($config->getApiEnvironment(),$config->getMerchantId(),$config->getApiKey(),$config->getApiSecret()));

if (count($argv) > 1) {
    $minSettlementDate = DateTime::createFromFormat('d-m-Y', $argv[1]);
} else {
    $now = new \DateTime();
    $minSettlementDate = $now->modify('-1 day');
}

$transactions = $client->searchTransactionsSettledAfter($minSettlementDate);

if (empty($transactions)) {
    print_r("No transactions found for the search criteria");
    return;
}
foreach ($transactions as $transaction) {
    print_r("Transaction " . $transaction->id . " (" . $transaction->type . ")". "\n");
}
