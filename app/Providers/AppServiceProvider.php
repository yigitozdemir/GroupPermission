<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('can-view', function (User $user) {
            $memberships = $user->memberships;
            foreach($memberships as $membership)
            {
                $group = Group::where('id', '=', $membership->group_id)->first();
                
                $permissions = $group->permissions;
                foreach($permissions as $permission)
                {
                    if($permission->permission > -1)
                    {
                        return true;
                    }
                }
            }
            return false;
        });


        Gate::define('can-edit', function (User $user) {
            //print_r($user);
            $memberships = $user->memberships;
            foreach($memberships as $membership)
            {
                $group = Group::where('id', '=', $membership->group_id)->first();
                //print_r($membership);
                $permissions = $group->permissions;
                //print_r($permissions);
                foreach($permissions as $permission)
                {
                    if($permission->permission > 0)
                    {
                        return true;
                    }
                }
            }
            return false;
        });


        Gate::define('can-delete', function (User $user) {
            $memberships = $user->memberships;
            foreach($memberships as $membership)
            {
                $group = Group::where('id', '=', $membership->group_id)->first();
                
                $permissions = $group->permissions;
                foreach($permissions as $permission)
                {
                    if($permission->permission > 1)
                    {
                        return true;
                    }
                }
            }
            return false;
        });
    }
    
}
