<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Observers\User\UserObserver;

use App\Models\User\UserAbout;
use App\Observers\User\UserAboutObserver;



class ObserverServiceProvider extends ServiceProvider
{

	protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		User::observe(UserObserver::class);
		UserAbout::observe(UserAboutObserver::class);
    }
}




