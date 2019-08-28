<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class rolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = Role::create(['name' => 'super admin']);
        $priest = Role::create(['name' => 'priest']);
        $servant = Role::create(['name' => 'servant']);
        $viewer = Role::create(['name' => 'viewer']);

        $permission = Permission::create(['name' => 'edit users']);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'edit rooms']);
        $priest->givePermissionTo($permission);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'view schedule']);
        $priest->givePermissionTo($permission);
        $servant->givePermissionTo($permission);
        $viewer->givePermissionTo($permission);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'accept booking']);
        $priest->givePermissionTo($permission);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'make booking']);
        $priest->givePermissionTo($permission);
        $servant->givePermissionTo($permission);
        $super->givePermissionTo($permission);



    }
}
