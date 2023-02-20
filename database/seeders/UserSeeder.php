<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'password',
        ]);

        $admin->roles()->attach(1);

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'email_verified_at' => now(),
            'password' => 'password',
        ]);

        $manager->roles()->attach(2);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => 'password',
        ]);

        $user->roles()->attach(3);
    }
}
