<?php

namespace App\Providers;

use App\Models\Admin\Catalog;
use App\Models\Admin\Nav;
use App\Models\Admin\SocialNetworks;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class BasicServiceProvider extends ServiceProvider
{
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
    	$this->menu();
    }

    public function menu()
	{
		View::composer('layouts.app', function ($view)
		{
			$view->with('basic', [
				'nav' => Nav::select(['name', 'url'])->toBase()->get(),
				'search' => Catalog::select(['id', 'url','title', 'preloader', 'price', 'old_price'])->with('category')->get(),
				'socialNetworks' => SocialNetworks::get(['href', 'icon']),
			] );
		});
	}

}
