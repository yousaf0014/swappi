<?php

namespace App\Providers;

use App\Ad;
use App\User;
use App\Review;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	//Number of active ads to view
    	view()->composer('*', function ($view) {
    		$activeAdCount = Ad::where('status', 1)->count();
    		$view->with('activeAdCount', $activeAdCount);
    	
    		//Number of userprofiles to view
    		$userCount = User::where('status', 1)->count();
    		$view->with('userCount', $userCount);
    		
    		//Number of ratings given to view
    		$rattingCount = Review::where('status', 1)->count();
    		$view->with('rattingCount', $rattingCount);
    		
    	});
    	
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
