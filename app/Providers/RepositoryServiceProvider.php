<?php

namespace App\Providers;

use App\Repository\Contracts\LoginInterface;
use App\Repository\Eloquent\LoginRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginInterface::class, LoginRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
