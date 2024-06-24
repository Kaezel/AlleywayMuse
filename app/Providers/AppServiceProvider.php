<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Shop\Repositories\Front\CartRepository;
use Modules\Shop\Repositories\Front\Interfaces\CartRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        view()->composer('*', function ($view) {
            $cartRepository = app(CartRepositoryInterface::class);
            $itemCount = auth()->check() ? $cartRepository->countItems(auth()->user()) : 0;
            $view->with('itemCount', $itemCount);
        });
    }
}
