<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit courses']);
        Permission::create(['name' => 'delete courses']);
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'enroll in courses']);
        Permission::create(['name' => 'submit assignments']);
        Permission::create(['name' => 'create assignments']);
        Permission::create(['name' => 'edit assignments']);
        Permission::create(['name' => 'delete assignments']);
        Permission::create(['name' => 'create feedback']);
        Permission::create(['name' => 'edit feedback']);
        Permission::create(['name' => 'delete feedback']);



        // create roles and assign created permissions
        $role = Role::create(['name' => 'lecturer']);
        $role->givePermissionTo('edit courses');
        $role->givePermissionTo('delete courses');
        $role->givePermissionTo('create courses');
        $role->givePermissionTo('submit assignments');
        $role->givePermissionTo('create assignments');
        $role->givePermissionTo('edit assignments');
        $role->givePermissionTo('delete assignments');
        $role->givePermissionTo('create feedback');
        $role->givePermissionTo('edit feedback');
        $role->givePermissionTo('delete feedback');

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo('enroll in courses');
        $role->givePermissionTo('submit assignments');

    }
}
