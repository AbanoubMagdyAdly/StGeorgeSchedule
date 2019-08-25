<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'primary',
            'email' => 'primary@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'secondary',
            'email' => 'secondary@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'preparatory',
            'email' => 'preparatory@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'youth',
            'email' => 'youth@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
