<?php

namespace App\Payments\Interfaces;

interface PaymentGateway
{
    public function charge($amount, $token);
    
    public function setCurrency($currency);
}