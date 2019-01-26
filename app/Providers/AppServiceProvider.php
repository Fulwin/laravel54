<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Observers\SoftwareObserver;
use App\Models\Software;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // generated command: php artisan make:scaffold
        if (app()->environment() == 'local' || app()->environment() == 'testing') {
            $this->app->register(\Summerblue\Generator\GeneratorsServiceProvider::class);
        }
    }
}
