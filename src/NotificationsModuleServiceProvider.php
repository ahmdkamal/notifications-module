<?php

namespace Kamal\NotificationsModule;

use Illuminate\Support\ServiceProvider;

class NotificationsModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/config/mobileNotification.php' => config_path('mobileNotification.php'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
