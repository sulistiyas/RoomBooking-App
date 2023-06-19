<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name'              => 'Sulistiya',
                'email'             => 'sulis@mail.com',
                'password'          => Hash::make('1234'),
                'level'             => 'admin',
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'name'              => 'Nugroho',
                'email'             => 'nugroho@mail.com',
                'password'          => Hash::make('1234'),
                'level'             => 'staff',
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'name'              => 'Derma',
                'email'             => 'derma@mail.com',
                'password'          => Hash::make('1234'),
                'level'             => 'staff',
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'name'              => 'Aty',
                'email'             => 'aty@mail.com',
                'password'          => Hash::make('1234'),
                'level'             => 'user',
                'remember_token'    => NULL,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
        ];

        User::insert($users);
    }
}
