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
        $priest = Role::create(['name' => 'امين النظام']);
        $servant = Role::create(['name' => 'امين خدمة']);
        $secretary = Role::create(['name' => 'مكتب الخدمة']);
        $viewer = Role::create(['name' => 'متابع']);

        $permission = Permission::create(['name' => 'edit users']);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'edit rooms']);
        $priest->givePermissionTo($permission);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'view schedule']);
        $priest->givePermissionTo($permission);
        $servant->givePermissionTo($permission);
        $viewer->givePermissionTo($permission);
        $secretary->givePermissionTo($permission);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'accept booking']);
        $priest->givePermissionTo($permission);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'make booking']);
        $priest->givePermissionTo($permission);
        $servant->givePermissionTo($permission);
        $super->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'secretary booking']);
        $priest->givePermissionTo($permission);
        $super->givePermissionTo($permission);
        $secretary->givePermissionTo($permission);

    }
}
