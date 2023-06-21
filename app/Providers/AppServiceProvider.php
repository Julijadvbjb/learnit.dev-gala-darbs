<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AppServiceProvider extends ServiceProvider
{
   
public function boot()
{
    $this->registerPermissions();
}

protected function registerPermissions()
{
    // Role::create(['name' => 'student']);
    // Role::create(['name' => 'lecturer']);
}

}
