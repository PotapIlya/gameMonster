<?php

namespace App\Providers;

use App\Models\Admin\Slider;
use App\Observers\Admin\SliderObserver;
use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Observers\User\UserObserver;

use App\Models\User\UserAbout;
use App\Observers\User\UserAboutObserver;



class ObserverServiceProvider extends ServiceProvider
{

	/**
	 * @var bool
	 */
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
		Slider::observe(SliderObserver::class);
    }
}




