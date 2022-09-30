<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Interfaces\BaseRepositoryInterface::class, \App\Repositories\BaseRepository::class);
        $this->app->bind(\App\Interfaces\MenuRepositoryInterface::class, \App\Repositories\MenuRepository::class);
        $this->app->bind(\App\Interfaces\LawyerRepositoryInterface::class, \App\Repositories\LawyerRepository::class);
        $this->app->bind(\App\Interfaces\PlanRepositoryInterface::class, \App\Repositories\PlanRepository::class);
        $this->app->bind(\App\Interfaces\PasswordResetRepositoryInterface::class, \App\Repositories\PasswordResetRepository::class);
        $this->app->bind(\App\Interfaces\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Interfaces\SubscriptionRepositoryInterface::class, \App\Repositories\SubscriptionRepository::class);
        $this->app->bind(\App\Interfaces\PaypalRepositoryInterface::class, \App\Repositories\PaypalRepository::class);
    }
}
