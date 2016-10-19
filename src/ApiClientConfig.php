<?php

namespace BraintreeDemo;

class ApiClientConfig
{
    const DEFAULT_API_ENVIRONMENT = 'sandbox';
    const DEFAULT_MERCHANT_ID = '2k7tzc7rzbm5db2j';
    const DEFAULT_API_KEY = 'tyf73vff3vxhbvj4';
    const DEFAULT_API_SECRET = '17299477e50c901da541ebd248459ff0';

    private $apiEnvironment = self::DEFAULT_API_ENVIRONMENT;
    private $merchantId = self::DEFAULT_MERCHANT_ID;
    private $apiKey = self::DEFAULT_API_KEY;
    private $apiSecret = self::DEFAULT_API_SECRET;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getApiEnvironment()
    {
        return $this->apiEnvironment;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getApiSecret()
    {
        return $this->apiSecret;
    }
}