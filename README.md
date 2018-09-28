# braintree-sdk-demo
Braintree SDK Demo Application

After checkout, go into braintree-sdk-demo folder and execute ```composer install```



```php createTransaction.php```

Creates a new transaction in "Authorized", "Processor declined", "Gateway rejected" or "Failed" status.

```php approveTransaction.php```

To submit a transaction for settlement (changes the transaction status from "Authorized" to "Submitted for Settlement")

```php cancelTransaction.php```

To cancel a transaction before it is settled (changes the transaction status from "Authorized" or "Submitted for Settlement" to "Voided").

```php settleTransaction.php```

To change the status of a transaction to settled (changes the transaction status from "Submitted for Settlement" to "Settled", out of sandbox this is automatically done by Braintree).

```php refundTransaction.php```

To refund a transaction that has already settled (creates a new transaction status in "Submitted for Settlement" status).

```php retrieveTransaction.php```

To see the status of a transaction.

```php searchTransactions.php```

To search for transactions settled after yesterday

```php searchTransactions.php dd-mm-yyyy```

To search for transactions settled after the date passed in
