<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Pagination\CustomLengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LengthAwarePaginator::class, CustomLengthAwarePaginator::class);    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //  
    }
}
