<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
   
public function boot()
{
    Gate::define('is-admin', function ($user){
        return $user->name == 'admin';
    });
}

protected function registerPermissions()
{

    
}

}
