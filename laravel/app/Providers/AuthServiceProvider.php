<?php

namespace App\Providers;

use App\Skill;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //Skills data in register view
        view()->composer('auth.register', function ($view) {
        	$skills = Skill::select('skillName')->get();
        	$skills = json_encode(array_pluck($skills, 'skillName'));
        	
        	$view->with('skills', $skills);
        });
        
    }
}
