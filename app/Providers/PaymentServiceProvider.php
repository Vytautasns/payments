<?php

namespace App\Providers;


use App\Payments\Interfaces\PaymentGateway;
use App\Services\Payments;
use Illuminate\Support\ServiceProvider;

/**
 * Class PaymentServiceProvider
 * @package App\Providers
 */
class PaymentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app()->singleton(PaymentGateway::class, static function () {
            return new Payments();
        });
        
        
        app(PaymentGateway::class)->setCurrency(config('payments.currency'));
    }
}