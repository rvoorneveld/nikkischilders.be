<?php

namespace App\Providers;

use App\Availability;
use App\Observers\AvailabilityObserver;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Nova::serving(static function() {
            Availability::observe(AvailabilityObserver::class);
        });
    }

}
