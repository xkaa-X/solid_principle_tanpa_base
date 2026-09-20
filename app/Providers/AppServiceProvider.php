<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;

use App\Contracts\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
