<?php

use App\User;
use App\Models\Room;
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
        $user = User::create([
            'name' => 'أبانوب مجدي عدلي',
            'email' => 'abanoub.magdy.adly@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('anabino@1996'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole('super admin');    

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $user->assignRole('priest');    

        $user = User::create([
            'name' => 'primary',
            'email' => 'primary@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole('servant');   

        $user = User::create([
            'name' => 'secondary',
            'email' => 'secondary@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole('servant');   

        $user = User::create([
            'name' => 'preparatory',
            'email' => 'preparatory@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole('servant');    

        $user = User::create([
            'name' => 'youth',
            'email' => 'youth@stgeorgeitd.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->assignRole('servant');    

        Room::create([
            'name' => 'الامير الاول',
            'building' => 'EL-Amir',
            'capacity' => 100,
            'has_air_conditioner' => true,
            'has_tv' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
