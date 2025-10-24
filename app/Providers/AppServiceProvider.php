<?php

namespace App\Providers;
use Stripe\Stripe;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\View;
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
