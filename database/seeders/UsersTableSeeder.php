<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'role' => 'super_admin'
        ]);

        User::create([
            'name'  => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name'  => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'role' => 'user'
        ]);
    }
}
