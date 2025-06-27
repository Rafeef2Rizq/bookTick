<?php

namespace App\Providers;
use Stripe\Stripe;

use App\Models\User;
use Laravel\Cashier\Cashier;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    Stripe::setApiKey(config('services.stripe.secret'));

    }
}
