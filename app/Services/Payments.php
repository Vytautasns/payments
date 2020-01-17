<?php

namespace App\Services;

use App\Payments\Interfaces\PaymentGateway;
use App\User;
use Braintree\Gateway;

class Payments implements PaymentGateway
{
    private $currency;
    
    /**
     * @var Gateway
     */
    private $gateway;
    
    public function __construct()
    {
         $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_MODE'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }
    
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    
    public function charge($amount, $nonce)
    {
        return $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
        ]);
    }
    
    public function createCustomer($customer)
    {
        return $this->gateway->customer()->create($customer);
    }
    
    public function generateToken(User $customer): string
    {
        return $this->gateway->clientToken()->generate([
            'customerId' => $customer->braintree_id
        ]);
    }
}