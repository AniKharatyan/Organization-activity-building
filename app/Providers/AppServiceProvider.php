<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 *     description="REST API for managing organizations, buildings, and activities."
 * )
 * @OA\Server(
 *     url="/",
 *     description="Local development server"
 * )
 */
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
        //
    }
}
