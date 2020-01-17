<?php

namespace App\Payments\Interfaces;

interface HasSubscriptions
{
    public function subscribe($plan, $customer);
    
    public function cancelSubscription($plan, $customer);
    
    public function getSubscriptions($customer);
    
    public function getPlans();
}