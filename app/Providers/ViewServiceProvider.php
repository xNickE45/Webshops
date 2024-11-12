<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import the View facade
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Cart; // Import the Cart model

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Using view composer to share cart items with all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
                $totalItems = $cartItems->sum('amount'); // Calculate total count of items
                $view->with('cartItems', $cartItems)->with('totalItems', $totalItems);
            } else {
                $view->with('cartItems', collect([]))->with('totalItems', 0); // Provide an empty collection and zero total items when not authenticated
            }
        });
    }
}
