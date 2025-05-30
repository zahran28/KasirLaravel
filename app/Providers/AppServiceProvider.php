<?php

namespace App\Providers;

use App\Events\user;
use App\Events\UserLog;
use App\Listeners\LoginSuccess;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

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
        Event::listen(UserLog::class, [LoginSuccess::class, "handle"]);
    }
}
