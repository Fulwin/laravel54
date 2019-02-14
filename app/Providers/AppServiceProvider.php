<?php

namespace App\Providers;

use App\Models\Summary;
use App\Observers\SummaryObserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
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

        Summary::observe(SummaryObserver::class);
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
