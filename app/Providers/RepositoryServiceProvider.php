<?php

namespace App\Providers;

use App\Repository\Contracts\LoginInterface;
use App\Repository\Contracts\PostInterface;
use App\Repository\Eloquent\LoginRepository;
use App\Repository\Eloquent\PostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginInterface::class, LoginRepository::class);
        $this->app->bind(PostInterface::class,PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
