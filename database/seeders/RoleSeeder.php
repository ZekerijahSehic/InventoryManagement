<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'Administrator'
        ]);


        $managerRole = Role::create([
            'name' => 'Manager'
        ]);

        $userRole = Role::create([
            'name' => 'User'
        ]);

        $allPages = Permission::create([
            'name' => 'all_pages'
        ]);

        $exceptUsers = Permission::create([
            'name' => 'except_user'
        ]);

        $onlyHome = Permission::create([
            'name' => 'only_home'
        ]);

        $adminRole->permissions()->attach(1);
        $managerRole->permissions()->attach(2);
        $userRole->permissions()->attach(3);


    }
}
