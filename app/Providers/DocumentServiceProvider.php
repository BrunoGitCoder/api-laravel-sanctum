<?php

namespace App\Providers;

use App\Services\DocumentService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class DocumentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(DocumentService::class, function (Application $app){
            return new DocumentService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
